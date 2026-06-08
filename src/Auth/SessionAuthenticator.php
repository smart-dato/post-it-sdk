<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Auth;

use Closure;
use JsonException;
use Saloon\Contracts\Authenticator;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\PendingRequest;
use SmartDato\PostIt\Connector\PosteItalianeConnector;
use SmartDato\PostIt\Exceptions\PostItApiException;
use SmartDato\PostIt\Requests\AuthRequest;

/**
 * Lazily exchanges client credentials for an access token, then attaches
 * `Authorization: Bearer <token>` to every authenticated request.
 *
 * The token is cached on the authenticator instance and reused until it nears
 * the `expires_in` deadline returned by Poste Italiane (tokens live ~1 hour),
 * after which it is transparently refreshed. Reuse the same authenticator
 * across requests to avoid redundant `/user/sessions` round-trips. Long-lived
 * caching across processes is the caller's responsibility (e.g. the
 * integrating application's cache layer).
 */
final class SessionAuthenticator implements Authenticator
{
    /**
     * Refresh this many seconds before the advertised expiry to absorb clock
     * skew and in-flight request latency.
     */
    private const int EXPIRY_SAFETY_MARGIN = 60;

    private const int DEFAULT_TTL = 3600;

    private ?string $accessToken = null;

    private int $expiresAt = 0;

    /**
     * @param  ?Closure(): int  $clock  Returns the current Unix timestamp; defaults to time(). Injectable for testing.
     */
    public function __construct(
        private readonly string $clientId,
        private readonly string $clientSecret,
        private readonly string $scope,
        private readonly string $grantType,
        private readonly PosteItalianeConnector $authConnector,
        private readonly ?Closure $clock = null,
    ) {}

    /**
     * @throws FatalRequestException
     * @throws RequestException
     * @throws JsonException
     */
    public function set(PendingRequest $pendingRequest): void
    {
        $token = $this->resolveToken();
        $pendingRequest->headers()->add('Authorization', 'Bearer '.$token);
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     * @throws JsonException
     */
    private function resolveToken(): string
    {
        if (is_string($this->accessToken) && $this->accessToken !== '' && $this->now() < $this->expiresAt) {
            return $this->accessToken;
        }

        $response = $this->authConnector->send(new AuthRequest(
            clientId: $this->clientId,
            clientSecret: $this->clientSecret,
            scope: $this->scope,
            grantType: $this->grantType,
        ));

        if ($response->failed()) {
            throw new PostItApiException(
                'Poste Italiane authentication failed: '.$response->status(),
            );
        }

        $accessToken = $response->json('access_token');

        if (! is_string($accessToken) || $accessToken === '') {
            throw new PostItApiException(
                'Poste Italiane authentication response is missing access_token.',
            );
        }

        $expiresIn = $response->json('expires_in');
        $ttl = is_numeric($expiresIn) ? (int) $expiresIn : self::DEFAULT_TTL;
        $this->expiresAt = $this->now() + max(0, $ttl - self::EXPIRY_SAFETY_MARGIN);

        return $this->accessToken = $accessToken;
    }

    private function now(): int
    {
        return $this->clock instanceof Closure ? ($this->clock)() : time();
    }
}

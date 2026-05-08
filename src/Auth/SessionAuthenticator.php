<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Auth;

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
 * The token is cached on the authenticator instance for the lifetime of the
 * caller; reuse the same authenticator across requests to avoid redundant
 * `/user/sessions` round-trips. Long-lived caching across processes is the
 * caller's responsibility (e.g. the integrating application's cache layer).
 */
final class SessionAuthenticator implements Authenticator
{
    private ?string $accessToken = null;

    public function __construct(
        private readonly string $clientId,
        private readonly string $clientSecret,
        private readonly string $scope,
        private readonly string $grantType,
        private readonly PosteItalianeConnector $authConnector,
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
        if (is_string($this->accessToken) && $this->accessToken !== '') {
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

        return $this->accessToken = $accessToken;
    }
}

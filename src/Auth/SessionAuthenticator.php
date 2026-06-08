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
use SmartDato\PostIt\Contracts\TokenStore;
use SmartDato\PostIt\Exceptions\PostItApiException;
use SmartDato\PostIt\Requests\AuthRequest;

/**
 * Lazily exchanges client credentials for an access token, then attaches
 * `Authorization: Bearer <token>` to every authenticated request.
 *
 * Tokens are cached in two layers: in-memory on the instance (L1) and, when a
 * {@see TokenStore} is supplied, in a shared cache (L2) keyed per `clientId`.
 * The per-account key means several accounts may share one cache store without
 * ever serving each other's token. Both layers honour the `expires_in`
 * deadline (minus a safety margin) and refresh transparently on expiry.
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
        private readonly ?TokenStore $tokenStore = null,
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
        $now = $this->now();

        if (is_string($this->accessToken) && $this->accessToken !== '' && $now < $this->expiresAt) {
            return $this->accessToken;
        }

        $shared = $this->readFromStore($now);
        if ($shared !== null) {
            return $shared;
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
        $lifetime = max(0, $ttl - self::EXPIRY_SAFETY_MARGIN);

        $this->expiresAt = $now + $lifetime;
        $this->accessToken = $accessToken;
        $this->writeToStore($accessToken, $this->expiresAt, max(1, $lifetime));

        return $accessToken;
    }

    private function readFromStore(int $now): ?string
    {
        if (! $this->tokenStore instanceof TokenStore) {
            return null;
        }

        $raw = $this->tokenStore->get($this->cacheKey());

        if ($raw === null) {
            return null;
        }

        try {
            /** @var mixed $decoded */
            $decoded = json_decode($raw, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException) {
            return null;
        }

        if (! is_array($decoded)) {
            return null;
        }

        $token = $decoded['token'] ?? null;
        $expiresAt = $decoded['expiresAt'] ?? null;

        if (! is_string($token) || $token === '' || ! is_int($expiresAt) || $now >= $expiresAt) {
            return null;
        }

        $this->accessToken = $token;
        $this->expiresAt = $expiresAt;

        return $token;
    }

    private function writeToStore(string $token, int $expiresAt, int $ttlSeconds): void
    {
        if (! $this->tokenStore instanceof TokenStore) {
            return;
        }

        $payload = json_encode(['token' => $token, 'expiresAt' => $expiresAt]);

        if ($payload === false) {
            return;
        }

        $this->tokenStore->put($this->cacheKey(), $payload, $ttlSeconds);
    }

    /**
     * Per-account cache key. `clientId` is kept in clear for debuggability; the
     * remaining inputs (including the secret) are folded into a short hash so a
     * changed environment, scope, or rotated secret never reuses a stale token.
     */
    private function cacheKey(): string
    {
        $discriminator = substr(hash('sha256', implode('|', [
            $this->authConnector->resolveBaseUrl(),
            $this->scope,
            $this->grantType,
            $this->clientSecret,
        ])), 0, 16);

        return sprintf('post-it:token:%s:%s', $this->clientId, $discriminator);
    }

    private function now(): int
    {
        return $this->clock instanceof Closure ? ($this->clock)() : time();
    }
}

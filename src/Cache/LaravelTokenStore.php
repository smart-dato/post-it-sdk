<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Cache;

use Illuminate\Contracts\Cache\Repository;
use SmartDato\PostIt\Auth\SessionAuthenticator;
use SmartDato\PostIt\Contracts\TokenStore;

/**
 * Adapts a Laravel cache repository to {@see TokenStore}.
 *
 * Pass any cache store (`Cache::store('redis')`, the default store, etc.) —
 * multiple accounts may safely share one store because tokens are keyed per
 * `clientId` by {@see SessionAuthenticator}.
 */
final readonly class LaravelTokenStore implements TokenStore
{
    public function __construct(
        private Repository $cache,
    ) {}

    public function get(string $key): ?string
    {
        $value = $this->cache->get($key);

        return is_string($value) ? $value : null;
    }

    public function put(string $key, string $value, int $ttlSeconds): void
    {
        $this->cache->put($key, $value, $ttlSeconds);
    }
}

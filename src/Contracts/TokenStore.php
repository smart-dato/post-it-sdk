<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Contracts;

use SmartDato\PostIt\Cache\LaravelTokenStore;

/**
 * Minimal key/value store for cached access tokens.
 *
 * Kept deliberately tiny so the SDK does not depend on a concrete cache
 * implementation; {@see LaravelTokenStore} adapts a
 * Laravel cache repository to this contract.
 */
interface TokenStore
{
    public function get(string $key): ?string;

    public function put(string $key, string $value, int $ttlSeconds): void;
}

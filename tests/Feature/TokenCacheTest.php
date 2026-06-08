<?php

declare(strict_types=1);

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use SmartDato\PostIt\Auth\SessionAuthenticator;
use SmartDato\PostIt\Connector\PosteItalianeConnector;
use SmartDato\PostIt\Contracts\TokenStore;
use SmartDato\PostIt\Requests\AuthRequest;
use SmartDato\PostIt\Requests\TrackShipmentRequest;

afterEach(fn () => MockClient::destroyGlobal());

final class ArrayTokenStore implements TokenStore
{
    /** @var array<string, string> */
    public array $entries = [];

    public function get(string $key): ?string
    {
        return $this->entries[$key] ?? null;
    }

    public function put(string $key, string $value, int $ttlSeconds): void
    {
        $this->entries[$key] = $value;
    }
}

function authenticatorFor(string $clientId, string $secret, TokenStore $store): SessionAuthenticator
{
    return new SessionAuthenticator(
        clientId: $clientId,
        clientSecret: $secret,
        scope: 'shipping',
        grantType: 'client_credentials',
        authConnector: new PosteItalianeConnector('https://api.test', $clientId),
        tokenStore: $store,
        clock: fn (): int => 1_000,
    );
}

function sendTracking(SessionAuthenticator $auth, string $clientId): void
{
    $connector = new PosteItalianeConnector('https://api.test', $clientId);
    $connector->authenticate($auth);
    $connector->send(new TrackShipmentRequest('WB1'));
}

it('keys the cached token by clientId', function (): void {
    MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok', 'expires_in' => 3599], 200),
        TrackShipmentRequest::class => MockResponse::make([], 200),
    ]);

    $store = new ArrayTokenStore;
    sendTracking(authenticatorFor('cli-1', 'sec-1', $store), 'cli-1');

    expect($store->entries)->toHaveCount(1)
        ->and(array_key_first($store->entries))->toStartWith('post-it:token:cli-1:');
});

it('reuses a token cached by another instance for the same account', function (): void {
    $mock = MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok', 'expires_in' => 3599], 200),
        TrackShipmentRequest::class => MockResponse::make([], 200),
    ]);

    $store = new ArrayTokenStore;

    sendTracking(authenticatorFor('cli-1', 'sec-1', $store), 'cli-1');
    sendTracking(authenticatorFor('cli-1', 'sec-1', $store), 'cli-1'); // fresh instance, shared store

    $mock->assertSentCount(1, AuthRequest::class);
    $mock->assertSentCount(2, TrackShipmentRequest::class);
});

it('never serves one account token to another', function (): void {
    $mock = MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok', 'expires_in' => 3599], 200),
        TrackShipmentRequest::class => MockResponse::make([], 200),
    ]);

    $store = new ArrayTokenStore;

    sendTracking(authenticatorFor('cli-1', 'sec-1', $store), 'cli-1');
    sendTracking(authenticatorFor('cli-2', 'sec-2', $store), 'cli-2');

    $mock->assertSentCount(2, AuthRequest::class);
    expect($store->entries)->toHaveCount(2);
});

it('re-authenticates when the cached token has expired', function (): void {
    $mock = MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok', 'expires_in' => 3599], 200),
        TrackShipmentRequest::class => MockResponse::make([], 200),
    ]);

    $store = new ArrayTokenStore;
    $auth = authenticatorFor('cli-1', 'sec-1', $store);

    $reflection = new ReflectionMethod($auth, 'cacheKey');
    $key = $reflection->invoke($auth);
    $store->entries[$key] = json_encode(['token' => 'stale', 'expiresAt' => 500]); // expired before clock=1000

    sendTracking($auth, 'cli-1');

    $mock->assertSentCount(1, AuthRequest::class);
});

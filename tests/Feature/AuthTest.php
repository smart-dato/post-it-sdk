<?php

declare(strict_types=1);

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use SmartDato\PostIt\Auth\SessionAuthenticator;
use SmartDato\PostIt\Connector\PosteItalianeConnector;
use SmartDato\PostIt\Exceptions\PostItApiException;
use SmartDato\PostIt\Requests\AuthRequest;
use SmartDato\PostIt\Requests\TrackShipmentRequest;

afterEach(fn () => MockClient::destroyGlobal());

it('exchanges credentials for an access token and applies Bearer header', function (): void {
    $mock = MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok-123'], 200),
        TrackShipmentRequest::class => MockResponse::make(['return' => ['code' => 0, 'shipment' => [['waybillNumber' => 'WB1', 'tracking' => []]]]], 200),
    ]);

    $connector = new PosteItalianeConnector('https://api.test', 'cli-1');
    $connector->authenticate(new SessionAuthenticator(
        clientId: 'cli-1',
        clientSecret: 'sec-1',
        scope: 'shipping',
        grantType: 'client_credentials',
        authConnector: new PosteItalianeConnector('https://api.test', 'cli-1'),
    ));

    $connector->send(new TrackShipmentRequest('WB1'));

    $sent = $mock->getLastPendingRequest();
    expect($sent)->not->toBeNull()
        ->and($sent->headers()->get('Authorization'))->toBe('Bearer tok-123')
        ->and($sent->headers()->get('POSTE_clientID'))->toBe('cli-1');
});

it('throws when authentication response lacks access_token', function (): void {
    MockClient::global([
        AuthRequest::class => MockResponse::make(['expires_in' => 3600], 200),
        TrackShipmentRequest::class => MockResponse::make([], 200),
    ]);

    $connector = new PosteItalianeConnector('https://api.test', 'cli-1');
    $connector->authenticate(new SessionAuthenticator(
        clientId: 'cli-1',
        clientSecret: 'sec-1',
        scope: 'shipping',
        grantType: 'client_credentials',
        authConnector: new PosteItalianeConnector('https://api.test', 'cli-1'),
    ));

    expect(fn () => $connector->send(new TrackShipmentRequest('WB1')))
        ->toThrow(PostItApiException::class, 'missing access_token');
});

it('throws when authentication request fails', function (): void {
    MockClient::global([
        AuthRequest::class => MockResponse::make([], 401),
        TrackShipmentRequest::class => MockResponse::make([], 200),
    ]);

    $connector = new PosteItalianeConnector('https://api.test', 'cli-1');
    $connector->authenticate(new SessionAuthenticator(
        clientId: 'cli-1',
        clientSecret: 'sec-1',
        scope: 'shipping',
        grantType: 'client_credentials',
        authConnector: new PosteItalianeConnector('https://api.test', 'cli-1'),
    ));

    expect(fn () => $connector->send(new TrackShipmentRequest('WB1')))
        ->toThrow(PostItApiException::class);
});

it('caches the token across multiple requests', function (): void {
    $mock = MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok-cached'], 200),
        TrackShipmentRequest::class => MockResponse::make(['return' => ['code' => 0, 'shipment' => [['waybillNumber' => 'WB1', 'tracking' => []]]]], 200),
    ]);

    $authenticator = new SessionAuthenticator(
        clientId: 'cli-1',
        clientSecret: 'sec-1',
        scope: 'shipping',
        grantType: 'client_credentials',
        authConnector: new PosteItalianeConnector('https://api.test', 'cli-1'),
    );

    $connector = new PosteItalianeConnector('https://api.test', 'cli-1');
    $connector->authenticate($authenticator);

    $connector->send(new TrackShipmentRequest('WB1'));
    $connector->send(new TrackShipmentRequest('WB2'));
    $connector->send(new TrackShipmentRequest('WB3'));

    $mock->assertSentCount(1, AuthRequest::class);
    $mock->assertSentCount(3, TrackShipmentRequest::class);
});

it('sends correct credential body to /user/sessions', function (): void {
    $mock = MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok-x'], 200),
        TrackShipmentRequest::class => MockResponse::make(['return' => ['code' => 0, 'shipment' => [['waybillNumber' => 'WB', 'tracking' => []]]]], 200),
    ]);

    $connector = new PosteItalianeConnector('https://api.test', 'cli-9');
    $connector->authenticate(new SessionAuthenticator(
        clientId: 'cli-9',
        clientSecret: 'sec-9',
        scope: 'tracking',
        grantType: 'client_credentials',
        authConnector: new PosteItalianeConnector('https://api.test', 'cli-9'),
    ));

    $connector->send(new TrackShipmentRequest('WB'));

    /** @var array<string, mixed> $authBody */
    $authBody = $mock->findResponseByRequest(AuthRequest::class)?->getPendingRequest()->body()->all() ?? [];

    expect($authBody)->toMatchArray([
        'clientId' => 'cli-9',
        'secretId' => 'sec-9',
        'scope' => 'tracking',
        'grantType' => 'client_credentials',
    ]);
});

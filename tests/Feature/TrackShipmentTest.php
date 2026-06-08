<?php

declare(strict_types=1);

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use SmartDato\PostIt\Data\TrackingResponseData;
use SmartDato\PostIt\Exceptions\PostItApiException;
use SmartDato\PostIt\PostIt;
use SmartDato\PostIt\Requests\AuthRequest;
use SmartDato\PostIt\Requests\TrackShipmentRequest;

afterEach(fn () => MockClient::destroyGlobal());

function makeTrackingPostIt(): PostIt
{
    return new PostIt(
        baseUrl: 'https://api.test',
        clientId: 'cli-1',
        clientSecret: 'sec-1',
        scope: 'tracking',
        grantType: 'client_credentials',
    );
}

it('extracts tracking events from the response', function (): void {
    MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        TrackShipmentRequest::class => MockResponse::make([
            'return' => [
                'outcome' => 'OK',
                'code' => 0,
                'shipment' => [
                    [
                        'waybillNumber' => 'WB-XYZ-1',
                        'tracking' => [
                            ['status' => 'IN_TRANSIT', 'StatusDescription' => 'In transit', 'officeDescription' => 'Roma', 'data' => '2026-05-01 08:00:00'],
                            ['status' => 'OUT_FOR_DELIVERY', 'StatusDescription' => 'Out for delivery', 'officeDescription' => 'Milano', 'data' => '2026-05-02 09:00:00'],
                            ['status' => 'DELIVERED', 'StatusDescription' => 'Delivered', 'officeDescription' => 'Milano', 'data' => '2026-05-02 15:30:00'],
                        ],
                    ],
                ],
            ],
        ]),
    ]);

    $response = makeTrackingPostIt()->trackShipment('WB-XYZ-1');

    expect($response)->toBeInstanceOf(TrackingResponseData::class)
        ->and($response->waybillNumber)->toBe('WB-XYZ-1')
        ->and($response->events)->toHaveCount(3)
        ->and($response->events[0]->statusCode)->toBe('IN_TRANSIT')
        ->and($response->events[0]->location)->toBe('Roma')
        ->and($response->events[0]->occurredAt?->format('Y-m-d H:i:s'))->toBe('2026-05-01 08:00:00')
        ->and($response->events[2]->statusCode)->toBe('DELIVERED');
});

it('throws on tracking error envelope', function (): void {
    MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok']),
        TrackShipmentRequest::class => MockResponse::make([
            'return' => [
                'outcome' => 'KO',
                'code' => 99,
                'messages' => [['messages' => ['Tracking unavailable']]],
            ],
        ]),
    ]);

    expect(fn () => makeTrackingPostIt()->trackShipment('WB-XYZ-1'))
        ->toThrow(PostItApiException::class, 'Poste Italiane tracking [99] Tracking unavailable');
});

it('sends the correct tracking request envelope', function (): void {
    $mock = MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok']),
        TrackShipmentRequest::class => MockResponse::make([
            'return' => ['code' => 0, 'shipment' => [['waybillNumber' => 'WB1', 'tracking' => []]]],
        ]),
    ]);

    makeTrackingPostIt()->trackShipment('WB1');

    /** @var array<string, mixed> $body */
    $body = $mock->findResponseByRequest(TrackShipmentRequest::class)?->getPendingRequest()->body()->all() ?? [];

    expect($body)->toHaveKey('arg0')
        ->and($body['arg0'])->toMatchArray([
            'statusDescription' => 'E',
            'customerType' => 'DQ',
            'shipmentsData' => [
                ['waybillNumber' => 'WB1', 'lastTracingState' => 'N'],
            ],
        ]);
});

it('requests only the latest state when fullHistory is false', function (): void {
    $mock = MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok']),
        TrackShipmentRequest::class => MockResponse::make([
            'return' => ['code' => 0, 'shipment' => [['waybillNumber' => 'WB1', 'tracking' => []]]],
        ]),
    ]);

    makeTrackingPostIt()->trackShipment('WB1', fullHistory: false);

    /** @var array<string, mixed> $body */
    $body = $mock->findResponseByRequest(TrackShipmentRequest::class)?->getPendingRequest()->body()->all() ?? [];

    expect($body['arg0']['shipmentsData'][0]['lastTracingState'])->toBe('Y');
});

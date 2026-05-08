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
            'shipments' => [
                [
                    'waybillNumber' => 'WB-XYZ-1',
                    'tracingHistory' => [
                        ['statusCode' => 'IN_TRANSIT', 'statusDescription' => 'In transit', 'location' => 'Roma', 'date' => '2026-05-01T08:00:00Z'],
                        ['statusCode' => 'OUT_FOR_DELIVERY', 'statusDescription' => 'Out for delivery', 'location' => 'Milano', 'date' => '2026-05-02T09:00:00Z'],
                        ['statusCode' => 'DELIVERED', 'statusDescription' => 'Delivered', 'location' => 'Milano', 'date' => '2026-05-02T15:30:00Z'],
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
        ->and($response->events[0]->occurredAt?->format('c'))->toBe('2026-05-01T08:00:00+00:00')
        ->and($response->events[2]->statusCode)->toBe('DELIVERED');
});

it('handles the alternate shipmentsData / tracingStates response shape', function (): void {
    MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok']),
        TrackShipmentRequest::class => MockResponse::make([
            'shipmentsData' => [
                [
                    'waybillNumber' => 'WB-ALT-2',
                    'tracingStates' => [
                        ['statusCode' => 'ACCEPTED', 'statusDescription' => 'Accepted', 'location' => 'Hub', 'statusDate' => '2026-04-30T07:00:00Z'],
                    ],
                ],
            ],
        ]),
    ]);

    $response = makeTrackingPostIt()->trackShipment('WB-ALT-2');

    expect($response->waybillNumber)->toBe('WB-ALT-2')
        ->and($response->events)->toHaveCount(1)
        ->and($response->events[0]->statusCode)->toBe('ACCEPTED');
});

it('throws on tracking error envelope', function (): void {
    MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok']),
        TrackShipmentRequest::class => MockResponse::make([
            'result' => ['errorCode' => 99, 'errorDescription' => 'Tracking unavailable'],
        ]),
    ]);

    expect(fn () => makeTrackingPostIt()->trackShipment('WB-XYZ-1'))
        ->toThrow(PostItApiException::class, 'Poste Italiane tracking [99] Tracking unavailable');
});

it('sends the correct tracking request envelope', function (): void {
    $mock = MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok']),
        TrackShipmentRequest::class => MockResponse::make([
            'shipments' => [['waybillNumber' => 'WB1', 'tracingHistory' => []]],
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

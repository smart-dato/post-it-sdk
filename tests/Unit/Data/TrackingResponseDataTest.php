<?php

declare(strict_types=1);

use SmartDato\PostIt\Data\TrackingResponseData;
use SmartDato\PostIt\Exceptions\PostItApiException;

it('parses primary shape (shipments + tracingHistory)', function (): void {
    $response = TrackingResponseData::fromArray([
        'shipments' => [[
            'waybillNumber' => 'WB1',
            'tracingHistory' => [
                ['statusCode' => 'IN_TRANSIT', 'statusDescription' => 'In transit', 'location' => 'Roma', 'date' => '2026-05-01T08:00:00Z'],
            ],
        ]],
    ]);

    expect($response->waybillNumber)->toBe('WB1')
        ->and($response->events)->toHaveCount(1)
        ->and($response->events[0]->statusCode)->toBe('IN_TRANSIT');
});

it('parses alternate shape (shipmentsData + tracingStates)', function (): void {
    $response = TrackingResponseData::fromArray([
        'shipmentsData' => [[
            'waybillNumber' => 'WB2',
            'tracingStates' => [
                ['statusCode' => 'ACCEPTED', 'statusDescription' => 'Accepted', 'location' => 'Hub', 'statusDate' => '2026-04-30T07:00:00Z'],
            ],
        ]],
    ]);

    expect($response->waybillNumber)->toBe('WB2')
        ->and($response->events[0]->statusCode)->toBe('ACCEPTED');
});

it('throws when result.errorCode is non-zero', function (): void {
    expect(fn () => TrackingResponseData::fromArray([
        'result' => ['errorCode' => 7, 'errorDescription' => 'Tracking down'],
    ]))->toThrow(PostItApiException::class, 'tracking [7] Tracking down');
});

it('throws when no shipment data is present', function (): void {
    expect(fn () => TrackingResponseData::fromArray([]))
        ->toThrow(PostItApiException::class, 'missing shipment data');
});

it('skips non-array tracing entries', function (): void {
    $response = TrackingResponseData::fromArray([
        'shipments' => [[
            'waybillNumber' => 'WB1',
            'tracingHistory' => [
                ['statusCode' => 'A', 'date' => '2026-05-01T08:00:00Z'],
                'garbage-string',
                42,
                ['statusCode' => 'B', 'date' => '2026-05-02T08:00:00Z'],
            ],
        ]],
    ]);

    expect($response->events)->toHaveCount(2)
        ->and($response->events[0]->statusCode)->toBe('A')
        ->and($response->events[1]->statusCode)->toBe('B');
});

it('returns null occurredAt for unparseable date strings', function (): void {
    $response = TrackingResponseData::fromArray([
        'shipments' => [[
            'waybillNumber' => 'WB1',
            'tracingHistory' => [
                ['statusCode' => 'X', 'date' => 'not-a-date'],
            ],
        ]],
    ]);

    expect($response->events[0]->occurredAt)->toBeNull();
});

it('returns null occurredAt when date field is missing', function (): void {
    $response = TrackingResponseData::fromArray([
        'shipments' => [[
            'waybillNumber' => 'WB1',
            'tracingHistory' => [
                ['statusCode' => 'X'],
            ],
        ]],
    ]);

    expect($response->events[0]->occurredAt)->toBeNull();
});

it('treats result.errorCode = 0 as success', function (): void {
    $response = TrackingResponseData::fromArray([
        'result' => ['errorCode' => 0],
        'shipments' => [['waybillNumber' => 'WB1', 'tracingHistory' => []]],
    ]);

    expect($response->waybillNumber)->toBe('WB1')
        ->and($response->events)->toBeEmpty();
});

<?php

declare(strict_types=1);

use SmartDato\PostIt\Data\TrackingResponseData;
use SmartDato\PostIt\Exceptions\PostItApiException;

it('parses the documented return envelope', function (): void {
    $response = TrackingResponseData::fromArray([
        'return' => [
            'outcome' => 'OK',
            'code' => 0,
            'result' => 'OK',
            'shipment' => [[
                'waybillNumber' => 'WB1',
                'product' => 'POSTEDELIVERY INTERNATIONAL EXPRESS',
                'tracking' => [
                    [
                        'data' => '2013-06-27 18:51:00',
                        'officeDescription' => 'Genoa (GE)',
                        'StatusDescription' => 'In transit at Poste operational centre',
                        'synthesisStatusDescription' => 'Shipment is in transit near Genoa (GE)',
                        'phase' => 'IN TRANSIT',
                        'status' => 'PCP',
                    ],
                ],
            ]],
        ],
    ]);

    expect($response->waybillNumber)->toBe('WB1')
        ->and($response->events)->toHaveCount(1)
        ->and($response->events[0]->statusCode)->toBe('PCP')
        ->and($response->events[0]->statusDescription)->toBe('In transit at Poste operational centre')
        ->and($response->events[0]->location)->toBe('Genoa (GE)')
        ->and($response->events[0]->phase)->toBe('IN TRANSIT')
        ->and($response->events[0]->synthesisStatusDescription)->toBe('Shipment is in transit near Genoa (GE)')
        ->and($response->events[0]->occurredAt?->format('Y-m-d H:i:s'))->toBe('2013-06-27 18:51:00');
});

it('tolerates an envelope that is not wrapped in return', function (): void {
    $response = TrackingResponseData::fromArray([
        'outcome' => 'OK',
        'code' => 0,
        'shipment' => [[
            'waybillNumber' => 'WB2',
            'tracking' => [
                ['status' => 'ACCEPTED', 'StatusDescription' => 'Accepted', 'data' => '2026-04-30 07:00:00'],
            ],
        ]],
    ]);

    expect($response->waybillNumber)->toBe('WB2')
        ->and($response->events[0]->statusCode)->toBe('ACCEPTED');
});

it('throws when code is non-zero', function (): void {
    expect(fn () => TrackingResponseData::fromArray([
        'return' => [
            'outcome' => 'KO',
            'code' => 200,
            'messages' => [['messages' => ['Tracking down']]],
        ],
    ]))->toThrow(PostItApiException::class, 'tracking [200] Tracking down');
});

it('throws when outcome is KO without an error code', function (): void {
    expect(fn () => TrackingResponseData::fromArray([
        'return' => ['outcome' => 'KO'],
    ]))->toThrow(PostItApiException::class, 'tracking [KO] Tracking request failed');
});

it('throws when no shipment data is present', function (): void {
    expect(fn () => TrackingResponseData::fromArray(['return' => ['outcome' => 'OK', 'code' => 0]]))
        ->toThrow(PostItApiException::class, 'missing shipment data');
});

it('skips non-array tracking entries', function (): void {
    $response = TrackingResponseData::fromArray([
        'return' => [
            'code' => 0,
            'shipment' => [[
                'waybillNumber' => 'WB1',
                'tracking' => [
                    ['status' => 'A', 'data' => '2026-05-01 08:00:00'],
                    'garbage-string',
                    42,
                    ['status' => 'B', 'data' => '2026-05-02 08:00:00'],
                ],
            ]],
        ],
    ]);

    expect($response->events)->toHaveCount(2)
        ->and($response->events[0]->statusCode)->toBe('A')
        ->and($response->events[1]->statusCode)->toBe('B');
});

it('returns null occurredAt for unparseable date strings', function (): void {
    $response = TrackingResponseData::fromArray([
        'return' => [
            'code' => 0,
            'shipment' => [[
                'waybillNumber' => 'WB1',
                'tracking' => [['status' => 'X', 'data' => 'not-a-date']],
            ]],
        ],
    ]);

    expect($response->events[0]->occurredAt)->toBeNull();
});

it('returns null occurredAt when data field is missing', function (): void {
    $response = TrackingResponseData::fromArray([
        'return' => [
            'code' => 0,
            'shipment' => [[
                'waybillNumber' => 'WB1',
                'tracking' => [['status' => 'X']],
            ]],
        ],
    ]);

    expect($response->events[0]->occurredAt)->toBeNull();
});

it('treats code = 0 with empty tracking as success', function (): void {
    $response = TrackingResponseData::fromArray([
        'return' => [
            'outcome' => 'OK',
            'code' => 0,
            'shipment' => [['waybillNumber' => 'WB1', 'tracking' => []]],
        ],
    ]);

    expect($response->waybillNumber)->toBe('WB1')
        ->and($response->events)->toBeEmpty();
});

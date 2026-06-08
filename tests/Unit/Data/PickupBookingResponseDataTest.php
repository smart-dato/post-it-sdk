<?php

declare(strict_types=1);

use SmartDato\PostIt\Data\PickupBookingResponseData;
use SmartDato\PostIt\Exceptions\PostItApiException;

it('parses the booking outcome', function (): void {
    $response = PickupBookingResponseData::fromArray([
        'bookingId' => 'CP41503560',
        'result' => ['item' => [['result' => 'OK', 'errorCode' => '', 'errorDescription' => '']]],
    ]);

    expect($response->bookingId)->toBe('CP41503560')
        ->and($response->result)->toBe('OK')
        ->and($response->errorCode)->toBeNull();
});

it('throws on a KO outcome with an error code', function (): void {
    expect(fn () => PickupBookingResponseData::fromArray([
        'bookingId' => '',
        'result' => ['item' => [['result' => 'KO', 'errorCode' => 'E0024', 'errorDescription' => 'OPERATION is incorrect. Correct value is I']]],
    ]))->toThrow(PostItApiException::class, '[E0024] OPERATION is incorrect. Correct value is I');
});

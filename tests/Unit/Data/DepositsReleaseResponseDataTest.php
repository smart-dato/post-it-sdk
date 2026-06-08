<?php

declare(strict_types=1);

use SmartDato\PostIt\Data\DepositsReleaseResponseData;

it('parses per-barcode release outcomes', function (): void {
    $response = DepositsReleaseResponseData::fromArray([
        'description' => 'Deliver to another address',
        'result' => ['item' => [
            ['errorDescription' => '', 'errorCode' => '', 'result' => 'OK', 'barcode' => '1UW0CN3000075'],
            ['errorDescription' => 'Already released', 'errorCode' => 'E0009', 'result' => 'KO', 'barcode' => '1UW0CN3000076'],
        ]],
    ]);

    expect($response->description)->toBe('Deliver to another address')
        ->and($response->items)->toHaveCount(2)
        ->and($response->items[0]->succeeded())->toBeTrue()
        ->and($response->failed())->toHaveCount(1)
        ->and($response->failed()[0]->barcode)->toBe('1UW0CN3000076')
        ->and($response->failed()[0]->errorCode)->toBe('E0009');
});

it('tolerates a single result object that is not wrapped in a list', function (): void {
    $response = DepositsReleaseResponseData::fromArray([
        'result' => ['item' => ['result' => 'OK', 'barcode' => 'X']],
    ]);

    expect($response->items)->toHaveCount(1)
        ->and($response->items[0]->barcode)->toBe('X');
});

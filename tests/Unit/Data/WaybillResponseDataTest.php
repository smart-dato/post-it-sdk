<?php

declare(strict_types=1);

use SmartDato\PostIt\Data\WaybillResponseData;
use SmartDato\PostIt\Exceptions\PostItApiException;

it('parses a successful response', function (): void {
    $response = WaybillResponseData::fromArray([
        'costCenterCode' => 'CC',
        'contractCode' => 'CT',
        'waybills' => [
            ['code' => 'WB1', 'downloadURL' => 'https://x.test/a.pdf'],
            ['code' => 'WB2', 'downloadURL' => 'https://x.test/b.pdf'],
        ],
    ]);

    expect($response->costCenterCode)->toBe('CC')
        ->and($response->contractCode)->toBe('CT')
        ->and($response->waybills)->toHaveCount(2)
        ->and($response->waybills[1]['code'])->toBe('WB2');
});

it('throws when result.errorCode is non-zero', function (): void {
    expect(fn () => WaybillResponseData::fromArray([
        'result' => ['errorCode' => 5, 'errorDescription' => 'Bad request'],
    ]))->toThrow(PostItApiException::class, '[5] Bad request');
});

it('throws when waybills array is missing', function (): void {
    expect(fn () => WaybillResponseData::fromArray([
        'costCenterCode' => 'CC',
        'contractCode' => 'CT',
    ]))->toThrow(PostItApiException::class, 'did not contain any waybills');
});

it('throws when waybills array is empty', function (): void {
    expect(fn () => WaybillResponseData::fromArray([
        'costCenterCode' => 'CC',
        'contractCode' => 'CT',
        'waybills' => [],
    ]))->toThrow(PostItApiException::class, 'did not contain any waybills');
});

it('throws when waybill is missing code', function (): void {
    expect(fn () => WaybillResponseData::fromArray([
        'waybills' => [['downloadURL' => 'https://x.test/a.pdf']],
    ]))->toThrow(PostItApiException::class, 'missing a waybill code');
});

it('accepts a paperless waybill with no downloadURL', function (): void {
    $response = WaybillResponseData::fromArray([
        'paperless' => true,
        'waybills' => [['code' => 'WB1']],
    ]);

    expect($response->waybills)->toHaveCount(1)
        ->and($response->waybills[0]['code'])->toBe('WB1')
        ->and($response->waybills[0]['downloadURL'])->toBeNull();
});

it('treats result.errorCode = 0 as success', function (): void {
    $response = WaybillResponseData::fromArray([
        'result' => ['errorCode' => 0, 'errorDescription' => 'OK'],
        'costCenterCode' => 'CC',
        'contractCode' => 'CT',
        'waybills' => [['code' => 'WB1', 'downloadURL' => 'https://x.test/a.pdf']],
    ]);

    expect($response->waybills[0]['code'])->toBe('WB1');
});

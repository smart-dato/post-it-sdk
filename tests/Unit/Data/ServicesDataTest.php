<?php

declare(strict_types=1);

use SmartDato\PostIt\Data\ServicesData;
use SmartDato\PostIt\Enums\PaymentMode;

it('returns empty array when nothing is set', function (): void {
    expect((new ServicesData)->toArray())->toBe([]);
});

it('serialises multicollo as empty object payload', function (): void {
    $services = new ServicesData(multicolloCode: 'APT000901');

    expect($services->toArray())->toBe(['APT000901' => []]);
});

it('serialises COD with formatted amount and payment mode', function (): void {
    $services = new ServicesData(
        codAmount: 50.0,
        codPaymentMode: PaymentMode::CashOnDelivery,
    );

    expect($services->toArray())->toBe([
        'APT000918' => ['amount' => '50.00', 'paymentMode' => 'CON'],
    ]);
});

it('always formats COD amount to two decimals', function (): void {
    $services = new ServicesData(
        codAmount: 7,
        codPaymentMode: PaymentMode::AccountChargeBank,
    );

    expect($services->toArray()['APT000918']['amount'])->toBe('7.00');
});

it('combines multicollo + COD + arbitrary extra services', function (): void {
    $services = new ServicesData(
        multicolloCode: 'APT000945',
        codAmount: 12.5,
        codPaymentMode: PaymentMode::AccountChargeMail,
        extra: [
            'APT999999' => ['flag' => 'true'],
        ],
    );

    expect($services->toArray())->toBe([
        'APT999999' => ['flag' => 'true'],
        'APT000945' => [],
        'APT000918' => ['amount' => '12.50', 'paymentMode' => 'ACM'],
    ]);
});

it('skips COD when only one of amount or paymentMode is set', function (): void {
    expect(new ServicesData(codAmount: 50.0)->toArray())->toBe([])
        ->and(new ServicesData(codPaymentMode: PaymentMode::CashOnDelivery)->toArray())->toBe([]);
});

it('skips multicollo when code is empty string', function (): void {
    expect(new ServicesData(multicolloCode: '')->toArray())->toBe([]);
});

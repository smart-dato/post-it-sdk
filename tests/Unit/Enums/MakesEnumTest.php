<?php

declare(strict_types=1);

use SmartDato\PostIt\Enums\PaymentMode;
use SmartDato\PostIt\Enums\PrintFormat;
use SmartDato\PostIt\Enums\Product;
use SmartDato\PostIt\Enums\ReceiverType;

it('makes an enum from its exact backing value', function (): void {
    expect(PrintFormat::make('1011'))->toBe(PrintFormat::FORMAT_1011)
        ->and(Product::make('APT000901'))->toBe(Product::Express)
        ->and(PaymentMode::make('CON'))->toBe(PaymentMode::CashOnDelivery);
});

it('matches case-insensitively and trims whitespace', function (): void {
    expect(PrintFormat::make('  a4 '))->toBe(PrintFormat::A4)
        ->and(PrintFormat::make('zpl'))->toBe(PrintFormat::ZPL);
});

it('matches on the case name as well as the value', function (): void {
    expect(Product::make('Express'))->toBe(Product::Express)
        ->and(PaymentMode::make('AccountChargeBank'))->toBe(PaymentMode::AccountChargeBank)
        ->and(ReceiverType::make('businessDelivery'))->toBe(ReceiverType::BusinessDelivery);
});

it('returns the same instance when given an enum', function (): void {
    expect(PrintFormat::make(PrintFormat::A4))->toBe(PrintFormat::A4);
});

it('throws a descriptive error for an unknown value', function (): void {
    expect(fn () => PrintFormat::make('nope'))
        ->toThrow(ValueError::class, '"nope" is not a valid '.PrintFormat::class);
});

it('tryMake returns null instead of throwing', function (): void {
    expect(PrintFormat::tryMake('nope'))->toBeNull()
        ->and(PrintFormat::tryMake(null))->toBeNull()
        ->and(PrintFormat::tryMake('A4'))->toBe(PrintFormat::A4);
});

it('exposes product metadata', function (): void {
    expect(Product::InternationalPlus->isInternational())->toBeTrue()
        ->and(Product::Express->isInternational())->toBeFalse()
        ->and(Product::InternationalStandard->label())->toBe('PosteDelivery Business Internazionale Standard');
});

it('defaults to the 10x11 format', function (): void {
    expect(PrintFormat::default())->toBe(PrintFormat::FORMAT_1011);
});

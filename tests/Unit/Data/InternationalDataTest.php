<?php

declare(strict_types=1);

use SmartDato\PostIt\Data\InternationalData;
use SmartDato\PostIt\Enums\ReceiverType;

it('serialises the receiverType enum to its value', function (): void {
    $international = new InternationalData(receiverType: ReceiverType::BusinessDelivery);

    expect($international->toArray())->toBe(['receiverType' => 'businessDelivery']);
});

it('accepts a raw receiverType string', function (): void {
    $international = new InternationalData(receiverType: 'retailDelivery');

    expect($international->toArray())->toBe(['receiverType' => 'retailDelivery']);
});

it('includes optional fields only when provided', function (): void {
    $international = new InternationalData(
        receiverType: ReceiverType::BusinessDelivery,
        currency: 'EUR',
        waybillTotalValue: '400',
        contentCode: '11',
        note: '',
    );

    expect($international->toArray())->toBe([
        'receiverType' => 'businessDelivery',
        'currency' => 'EUR',
        'waybillTotalValue' => '400',
        'contentCode' => '11',
        'note' => '',
    ]);
});

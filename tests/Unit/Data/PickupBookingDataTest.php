<?php

declare(strict_types=1);

use SmartDato\PostIt\Data\PickupAddressData;
use SmartDato\PostIt\Data\PickupBookingData;
use SmartDato\PostIt\Data\PickupContentData;
use SmartDato\PostIt\Enums\BookingType;
use SmartDato\PostIt\Enums\PickupOperation;
use SmartDato\PostIt\Enums\TimeSlot;

it('serialises the documented pickup booking item', function (): void {
    $item = new PickupBookingData(
        operation: PickupOperation::Add,
        bookingType: BookingType::Multiple,
        where: new PickupAddressData(givenName: 'Henrietta Hill', town: 'castel gandolfo', region: 'RM', postCode: '00073', country: 'IT'),
        pickupDate: '20201005',
        timeSlot: TimeSlot::Morning,
        contents: [new PickupContentData(containerType: 'B', quantity: 10, weightKg: 1, heightCm: 1, widthCm: 1, lengthCm: 1, description: 'pacchi')],
    );

    $array = $item->toArray();

    expect($array['operation'])->toBe('I')
        ->and($array['bookingType'])->toBe('RIT0003')
        ->and($array['timeSlot'])->toBe('AM')
        ->and($array['bulky'])->toBe('')
        ->and($array['where']['item'][0]['town'])->toBe('castel gandolfo')
        ->and($array['sender']['item'][0]['givenName'])->toBe('')
        ->and($array['receiver']['item'][0])->toHaveKey('postCode')
        ->and($array['content']['item'][0])->toBe([
            'containerType' => 'B', 'tipocontText' => 'pacchi', 'quantity' => 10,
            'weight' => 1, 'height' => 1, 'width' => 1, 'length' => 1,
        ])
        ->and($array)->not->toHaveKey('notify');
});

it('accepts raw string values and flags bulky and notify', function (): void {
    $item = new PickupBookingData(
        operation: 'I',
        bookingType: 'RIT0001',
        where: new PickupAddressData(town: 'Roma'),
        pickupDate: '20201005',
        timeSlot: 'PM',
        shipmentId: 'WB1',
        bulky: true,
        notify: true,
    );

    $array = $item->toArray();

    expect($array['operation'])->toBe('I')
        ->and($array['bookingType'])->toBe('RIT0001')
        ->and($array['timeSlot'])->toBe('PM')
        ->and($array['shipmentId'])->toBe('WB1')
        ->and($array['bulky'])->toBe('T')
        ->and($array['notify'])->toBe('Y');
});

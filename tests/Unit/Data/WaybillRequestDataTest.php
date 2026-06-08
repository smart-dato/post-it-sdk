<?php

declare(strict_types=1);

use SmartDato\PostIt\Data\AddressData;
use SmartDato\PostIt\Data\DeclarationData;
use SmartDato\PostIt\Data\WaybillData;
use SmartDato\PostIt\Data\WaybillRequestData;
use SmartDato\PostIt\Enums\PrintFormat;

function makeWaybillRequestWithDate(DateTimeImmutable $shipmentDate): WaybillRequestData
{
    return new WaybillRequestData(
        costCenterCode: 'CC100',
        shipmentDate: $shipmentDate,
        waybills: [
            new WaybillData(
                clientReferenceId: 'REF-1',
                printFormat: PrintFormat::A4,
                product: 'APT000901',
                sender: new AddressData('Sender Co', 'Mario Rossi', 'Via Roma', '1', '00100', 'Roma', '393331111111', '393331111111'),
                receiver: new AddressData('Receiver Co', 'Luigi Bianchi', 'Via Milano', '2', '20100', 'Milano', '393332222222', '393332222222'),
                declared: [new DeclarationData(weightGrams: 1500, heightCm: 20, lengthCm: 30, widthCm: 40)],
            ),
        ],
    );
}

it('serialises shipmentDate converted to UTC', function (): void {
    $data = makeWaybillRequestWithDate(new DateTimeImmutable('2026-05-07T12:00:00', new DateTimeZone('Europe/Rome')));

    expect($data->toArray()['shipmentDate'])->toBe('2026-05-07T10:00:00.000+0000');
});

it('keeps a UTC shipmentDate unchanged', function (): void {
    $data = makeWaybillRequestWithDate(new DateTimeImmutable('2026-05-07T10:00:00', new DateTimeZone('UTC')));

    expect($data->toArray()['shipmentDate'])->toBe('2026-05-07T10:00:00.000+0000');
});

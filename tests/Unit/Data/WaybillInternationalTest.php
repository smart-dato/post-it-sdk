<?php

declare(strict_types=1);

use SmartDato\PostIt\Data\AddressData;
use SmartDato\PostIt\Data\DeclarationData;
use SmartDato\PostIt\Data\InternationalData;
use SmartDato\PostIt\Data\ServicesData;
use SmartDato\PostIt\Data\WaybillData;
use SmartDato\PostIt\Enums\PaymentMode;
use SmartDato\PostIt\Enums\PrintFormat;
use SmartDato\PostIt\Enums\Product;
use SmartDato\PostIt\Enums\ReceiverType;

it('serialises an international waybill matching the documented sample', function (): void {
    $waybill = new WaybillData(
        clientReferenceId: 'Riferimento cliente1',
        printFormat: PrintFormat::A4,
        product: Product::InternationalStandard,
        sender: new AddressData(
            nameSurname: 'Ditta delle Ditte',
            contactName: 'Mario Rossi',
            address: 'via pinco panco',
            streetNumber: '45',
            zipCode: '00142',
            city: 'ROMA',
            cellphone: '',
            phone: '37747383787287',
            email: 'mail@mail.it',
            province: 'RM',
        ),
        receiver: new AddressData(
            nameSurname: 'Adolf Schmidt',
            contactName: 'Aron Fisher',
            address: 'ul.Slawecinska',
            streetNumber: '27',
            zipCode: '10115',
            city: 'Berlino',
            cellphone: '',
            phone: '11111111111',
            email: 'mail@mail.it',
            country: 'GER1',
            countryName: 'Germania',
        ),
        declared: [
            new DeclarationData(
                weightGrams: 3000,
                heightCm: 10,
                lengthCm: 50,
                widthCm: 25,
                description: 'Merce non destinata alla vendita',
                packagingCode: 'C',
                nationality: 'IT',
            ),
        ],
        content: 'contenuto',
        services: new ServicesData(codAmount: 5000.0, codPaymentMode: PaymentMode::AccountChargeBank),
        international: new InternationalData(
            receiverType: ReceiverType::BusinessDelivery,
            currency: 'EUR',
            waybillTotalValue: '400',
            contentCode: '11',
            note: '',
        ),
    );

    $payload = $waybill->toArray();

    expect($payload['product'])->toBe('APT000904')
        ->and($payload['data']['international'])->toBe([
            'receiverType' => 'businessDelivery',
            'currency' => 'EUR',
            'waybillTotalValue' => '400',
            'contentCode' => '11',
            'note' => '',
        ])
        ->and($payload['data']['declared'][0])->toBe([
            'weight' => '3000',
            'height' => '10',
            'length' => '50',
            'width' => '25',
            'description' => 'Merce non destinata alla vendita',
            'packagingCode' => 'C',
            'nationality' => 'IT',
        ])
        ->and($payload['data']['sender']['province'])->toBe('RM')
        ->and($payload['data']['receiver'])->not->toHaveKey('province')
        ->and($payload['data']['services'])->toBe([
            'APT000918' => ['amount' => '5000.00', 'paymentMode' => 'ABM'],
        ]);
});

it('omits the international block for domestic waybills', function (): void {
    $waybill = new WaybillData(
        clientReferenceId: 'REF-1',
        printFormat: PrintFormat::FORMAT_1011,
        product: Product::Express,
        sender: new AddressData('A', 'A', 'Via', '1', '00100', 'Roma', '', '393331111111'),
        receiver: new AddressData('B', 'B', 'Via', '2', '20100', 'Milano', '', '393332222222'),
        declared: [new DeclarationData(weightGrams: 1000, heightCm: 10, lengthCm: 10, widthCm: 10)],
    );

    expect($waybill->toArray()['data'])->not->toHaveKey('international');
});

<?php

declare(strict_types=1);

use SmartDato\PostIt\Constants\PrintFormat;
use SmartDato\PostIt\Data\AddressData;
use SmartDato\PostIt\Data\DeclarationData;
use SmartDato\PostIt\Data\WaybillData;
use SmartDato\PostIt\Data\WaybillRequestData;
use SmartDato\PostIt\Data\WaybillResponseData;
use SmartDato\PostIt\PostIt;

it('creates a domestic waybill against the live test environment', function (): void {
    $creds = postItIntegrationCredentials();
    $costCenter = getenv('POST_IT_TEST_COST_CENTER');

    $client = new PostIt(
        baseUrl: $creds['baseUrl'],
        clientId: $creds['clientId'],
        clientSecret: $creds['clientSecret'],
        scope: $creds['scope'],
        grantType: $creds['grantType'],
    );

    $product = getenv('POST_IT_TEST_PRODUCT') ?: 'APT000901';

    $response = $client->createWaybill(new WaybillRequestData(
        costCenterCode: $costCenter,
        shipmentDate: new DateTimeImmutable,
        waybills: [
            new WaybillData(
                clientReferenceId: 'INT-TEST-'.date('YmdHis'),
                printFormat: PrintFormat::A4,
                product: $product,
                sender: new AddressData(
                    nameSurname: 'Ditta delle Ditte',
                    contactName: 'Mario Rossi',
                    address: 'via pinco panco',
                    streetNumber: '45',
                    zipCode: '00142',
                    city: 'ROMA',
                    cellphone: '393331111111',
                    phone: '393331111111',
                ),
                receiver: new AddressData(
                    nameSurname: 'Ditta test',
                    contactName: 'Aldo Bianchi',
                    address: 'Viale del tramonto',
                    streetNumber: '27',
                    zipCode: '80010',
                    city: 'NAPOLI',
                    cellphone: '393332222222',
                    phone: '393332222222',
                ),
                declared: [new DeclarationData(weightGrams: 1000, heightCm: 10, lengthCm: 30, widthCm: 25)],
            ),
        ],
    ));

    expect($response)->toBeInstanceOf(WaybillResponseData::class)
        ->and($response->waybills)->not->toBeEmpty()
        ->and($response->waybills[0]['code'])->toBeString()->not->toBeEmpty();
})->skip(
    fn () => postItIntegrationCredentials() === null || ! getenv('POST_IT_TEST_COST_CENTER'),
    'Also set POST_IT_TEST_COST_CENTER (a valid cost-centre for the test account) to run the live waybill-creation test.'
);

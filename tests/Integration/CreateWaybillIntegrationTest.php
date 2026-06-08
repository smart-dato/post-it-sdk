<?php

declare(strict_types=1);

use SmartDato\PostIt\Constants\PrintFormat;
use SmartDato\PostIt\Data\AddressData;
use SmartDato\PostIt\Data\DeclarationData;
use SmartDato\PostIt\Data\WaybillData;
use SmartDato\PostIt\Data\WaybillRequestData;
use SmartDato\PostIt\Data\WaybillResponseData;
use SmartDato\PostIt\PostIt;

/**
 * Mirrors the production "create shipment" payload (domestic Express
 * APT000901, 1011 print format) with fake Mustermann/Rossi parties.
 *
 * WARNING: when POST_IT_TEST_COST_CENTER is set this creates a *real*
 * shipment against whatever POST_IT_TEST_BASE_URL points to.
 */
it('creates a domestic Express waybill against the live environment', function (): void {
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
                clientReferenceId: 'TEST-'.date('YmdHis'),
                printFormat: PrintFormat::FORMAT_1011,
                product: $product,
                sender: new AddressData(
                    nameSurname: 'Mustermann GmbH',
                    contactName: 'Hannes Mustermann',
                    address: 'Via Luigi Negrelli',
                    streetNumber: '15',
                    zipCode: '39100',
                    city: 'BOLZANO',
                    cellphone: '+390471000000',
                    phone: '+390471000000',
                    email: 'hannes.mustermann@example.com',
                ),
                receiver: new AddressData(
                    nameSurname: 'Rossi SNC',
                    contactName: 'Mario Rossi',
                    address: 'Via Giuseppe Di Vittorio',
                    streetNumber: '18',
                    zipCode: '48026',
                    city: 'RUSSI',
                    cellphone: '',
                    phone: '',
                    email: 'mario.rossi@example.com',
                ),
                declared: [new DeclarationData(weightGrams: 6880, heightCm: 13, lengthCm: 28, widthCm: 18)],
            ),
        ],
    ));

    expect($response)->toBeInstanceOf(WaybillResponseData::class)
        ->and($response->contractCode)->toBeString()->not->toBeEmpty()
        ->and($response->waybills)->not->toBeEmpty()
        ->and($response->waybills[0]['code'])->toBeString()->not->toBeEmpty();

    echo "\nCreated waybill: {$response->waybills[0]['code']}\n";
    echo 'Label: '.($response->waybills[0]['downloadURL'] ?? '(paperless)')."\n";
})->skip(
    fn () => postItIntegrationCredentials() === null || ! getenv('POST_IT_TEST_COST_CENTER'),
    'Also set POST_IT_TEST_COST_CENTER (a valid cost-centre for the account) to run the live waybill-creation test.'
);

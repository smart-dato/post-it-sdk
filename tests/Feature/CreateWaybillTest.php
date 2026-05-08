<?php

declare(strict_types=1);

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use SmartDato\PostIt\Constants\PrintFormat;
use SmartDato\PostIt\Data\AddressData;
use SmartDato\PostIt\Data\DeclarationData;
use SmartDato\PostIt\Data\ServicesData;
use SmartDato\PostIt\Data\WaybillData;
use SmartDato\PostIt\Data\WaybillRequestData;
use SmartDato\PostIt\Data\WaybillResponseData;
use SmartDato\PostIt\Enums\PaymentModeEnum;
use SmartDato\PostIt\Exceptions\PostItApiException;
use SmartDato\PostIt\PostIt;
use SmartDato\PostIt\Requests\AuthRequest;
use SmartDato\PostIt\Requests\CreateWaybillRequest;

afterEach(fn () => MockClient::destroyGlobal());

function makeWaybillRequest(): WaybillRequestData
{
    return new WaybillRequestData(
        costCenterCode: 'CC100',
        shipmentDate: new DateTimeImmutable('2026-05-07T10:00:00Z'),
        waybills: [
            new WaybillData(
                clientReferenceId: 'REF-1',
                printFormat: PrintFormat::A4,
                product: 'POSTACELERE',
                sender: new AddressData('Sender Co', 'Mario Rossi', 'Via Roma', '1', '00100', 'Roma', '393331111111', '393331111111'),
                receiver: new AddressData('Receiver Co', 'Luigi Bianchi', 'Via Milano', '2', '20100', 'Milano', '393332222222', '393332222222'),
                declared: [new DeclarationData(weightGrams: 1500, heightCm: 20, lengthCm: 30, widthCm: 40)],
                services: new ServicesData(codAmount: 50.0, codPaymentMode: PaymentModeEnum::CashOnDelivery),
            ),
        ],
    );
}

function makePostIt(): PostIt
{
    return new PostIt(
        baseUrl: 'https://api.test',
        clientId: 'cli-1',
        clientSecret: 'sec-1',
        scope: 'shipping',
        grantType: 'client_credentials',
    );
}

it('creates a waybill and hydrates the response DTO', function (): void {
    MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        CreateWaybillRequest::class => MockResponse::make([
            'costCenterCode' => 'CC100',
            'contractCode' => 'CT-9',
            'waybills' => [
                ['code' => 'WB-XYZ-1', 'downloadURL' => 'https://files.test/label.pdf'],
            ],
        ], 200),
    ]);

    $response = makePostIt()->createWaybill(makeWaybillRequest());

    expect($response)->toBeInstanceOf(WaybillResponseData::class)
        ->and($response->costCenterCode)->toBe('CC100')
        ->and($response->contractCode)->toBe('CT-9')
        ->and($response->waybills)->toHaveCount(1)
        ->and($response->waybills[0]['code'])->toBe('WB-XYZ-1')
        ->and($response->waybills[0]['downloadURL'])->toBe('https://files.test/label.pdf');
});

it('throws PostItApiException when result.errorCode is non-zero', function (): void {
    MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        CreateWaybillRequest::class => MockResponse::make([
            'result' => ['errorCode' => 1234, 'errorDescription' => 'Boom'],
        ], 200),
    ]);

    expect(fn () => makePostIt()->createWaybill(makeWaybillRequest()))
        ->toThrow(PostItApiException::class, '[1234] Boom');
});

it('serialises the request payload exactly as Poste Italiane expects', function (): void {
    $mock = MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        CreateWaybillRequest::class => MockResponse::make([
            'costCenterCode' => 'CC100',
            'contractCode' => 'CT-9',
            'waybills' => [['code' => 'WB1', 'downloadURL' => 'https://files.test/label.pdf']],
        ], 200),
    ]);

    makePostIt()->createWaybill(makeWaybillRequest());

    /** @var array<string, mixed> $body */
    $body = $mock->findResponseByRequest(CreateWaybillRequest::class)?->getPendingRequest()->body()->all() ?? [];

    expect($body)->toHaveKeys(['costCenterCode', 'shipmentDate', 'paperless', 'waybills'])
        ->and($body['costCenterCode'])->toBe('CC100')
        ->and($body['paperless'])->toBe('false');

    /** @var array<int, array<string, mixed>> $waybills */
    $waybills = $body['waybills'];

    expect($waybills)->toHaveCount(1)
        ->and($waybills[0])->toHaveKeys(['clientReferenceId', 'printFormat', 'product', 'data'])
        ->and($waybills[0]['printFormat'])->toBe(PrintFormat::A4);

    /** @var array<string, mixed> $data */
    $data = $waybills[0]['data'];

    expect($data)->toHaveKeys(['declared', 'content', 'services', 'sender', 'receiver'])
        ->and($data['content'])->toBe('goods')
        ->and($data['services'])->toBe([
            'APT000918' => ['amount' => '50.00', 'paymentMode' => 'CON'],
        ])
        ->and($data['declared'])->toBe([
            ['weight' => '1500', 'height' => '20', 'length' => '30', 'width' => '40'],
        ]);
});

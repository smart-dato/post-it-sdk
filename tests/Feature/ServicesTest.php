<?php

declare(strict_types=1);

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use SmartDato\PostIt\Data\DeclarationData;
use SmartDato\PostIt\Data\ServiceAddressData;
use SmartDato\PostIt\Data\ServicesQueryData;
use SmartDato\PostIt\Data\ServicesResponseData;
use SmartDato\PostIt\Enums\Product;
use SmartDato\PostIt\Exceptions\PostItApiException;
use SmartDato\PostIt\PostIt;
use SmartDato\PostIt\Requests\AuthRequest;
use SmartDato\PostIt\Requests\GetServicesRequest;

afterEach(fn () => MockClient::destroyGlobal());

function makeServicesPostIt(): PostIt
{
    return new PostIt(
        baseUrl: 'https://api.test',
        clientId: 'cli-1',
        clientSecret: 'sec-1',
        scope: 'shipping',
        grantType: 'client_credentials',
    );
}

function makeServicesQuery(): ServicesQueryData
{
    return new ServicesQueryData(
        costCenterCode: 'CDC-00073352',
        product: Product::Express,
        sender: new ServiceAddressData(zipCode: '00142', city: 'ROME', country: 'ITA1', streetNumber: '45', province: 'RM', email: 'mail@mail.it', phone: '37747383787287'),
        receiver: new ServiceAddressData(zipCode: '10020', city: 'New York', country: 'USA1', streetNumber: '27', address: 'Fifth, 44', email: 'mail@mail.it', phone: '11111111111'),
        declared: [new DeclarationData(weightGrams: 10, heightCm: 10, lengthCm: 30, widthCm: 25, packagingCode: 'C')],
    );
}

it('extracts services, compatibilities and the parameter map', function (): void {
    $mock = MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        GetServicesRequest::class => MockResponse::make([
            'channel' => 'WEBSERVICES', 'contractCode' => 'SFA-00608323', 'costCenterCode' => 'CDC-00073352', 'product' => 'APT000901',
            'services' => ['APT000912', 'APT000918', 'APT000945'],
            'result' => ['codeError' => 0, 'codeDescription' => 'OK'],
            'serviceMap' => ['APT000912' => [], 'APT000918' => []],
            'compatibilities' => ['APT000945' => ['APT000906', 'APT000918', 'RIT']],
            'constraints' => ['APT000918' => ['ITA1' => ['CON' => '3000']]],
        ], 200),
    ]);

    $response = makeServicesPostIt()->getServices(makeServicesQuery());

    expect($response)->toBeInstanceOf(ServicesResponseData::class)
        ->and($response->services)->toBe(['APT000912', 'APT000918', 'APT000945'])
        ->and($response->serviceMap)->toHaveKey('APT000912')
        ->and($response->compatibilities['APT000945'])->toBe(['APT000906', 'APT000918', 'RIT'])
        ->and($response->constraints)->toHaveKey('APT000918');

    /** @var array<string, mixed> $body */
    $body = $mock->findResponseByRequest(GetServicesRequest::class)?->getPendingRequest()->body()->all() ?? [];

    expect($body['product'])->toBe('APT000901')
        ->and($body['sender']['zipCode'])->toBe('00142')
        ->and($body['declared'][0])->toMatchArray(['weight' => '10', 'packagingCode' => 'C'])
        ->and($body)->toHaveKeys(['cashAmount', 'cashType']);
});

it('throws when result.codeError is non-zero', function (): void {
    MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        GetServicesRequest::class => MockResponse::make([
            'result' => ['codeError' => 42, 'codeDescription' => 'Bad product'],
        ], 200),
    ]);

    expect(fn () => makeServicesPostIt()->getServices(makeServicesQuery()))
        ->toThrow(PostItApiException::class, '[42] Bad product');
});

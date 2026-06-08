<?php

declare(strict_types=1);

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use SmartDato\PostIt\Data\DeliveryPointResponseData;
use SmartDato\PostIt\Enums\DeliveryPointServiceType;
use SmartDato\PostIt\Exceptions\PostItApiException;
use SmartDato\PostIt\PostIt;
use SmartDato\PostIt\Requests\AuthRequest;
use SmartDato\PostIt\Requests\FindDeliveryPointsRequest;

afterEach(fn () => MockClient::destroyGlobal());

function makeDeliveryPointPostIt(): PostIt
{
    return new PostIt(
        baseUrl: 'https://api.test',
        clientId: 'cli-1',
        clientSecret: 'sec-1',
        scope: 'shipping',
        grantType: 'client_credentials',
    );
}

it('lists delivery points and trims padded values', function (): void {
    $mock = MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        FindDeliveryPointsRequest::class => MockResponse::make([
            'return' => [
                'outcome' => 'OK', 'code' => 0,
                'deliveryPoint' => [[
                    'zipCode' => '00152   ', 'officeCode' => 'Z1625  ', 'officeDescription' => 'Punto Poste TOBACCONIST No. 876   ',
                    'address' => 'VIA DI DONNA OLIMPIA 10   ', 'place' => 'ROME   ', 'openTimeMon' => '08:00:00 ',
                    'closeTimeMon' => '18:00:00 ', 'saturationPercentage' => '000', 'province' => 'RM ',
                    'XDegree' => '12.45051401  ', 'YDegree' => '41.87975199 ',
                ]],
            ],
        ], 200),
    ]);

    $response = makeDeliveryPointPostIt()->findDeliveryPoints('00152', DeliveryPointServiceType::PuntoPoste);

    expect($response)->toBeInstanceOf(DeliveryPointResponseData::class)
        ->and($response->outcome)->toBe('OK')
        ->and($response->deliveryPoints)->toHaveCount(1)
        ->and($response->deliveryPoints[0]->zipCode)->toBe('00152')
        ->and($response->deliveryPoints[0]->officeDescription)->toBe('Punto Poste TOBACCONIST No. 876')
        ->and($response->deliveryPoints[0]->latitude)->toBe('12.45051401')
        ->and($response->deliveryPoints[0]->longitude)->toBe('41.87975199');

    /** @var array<string, mixed> $body */
    $body = $mock->findResponseByRequest(FindDeliveryPointsRequest::class)?->getPendingRequest()->body()->all() ?? [];

    expect($body)->toBe(['arg0' => ['zipCode' => '00152', 'serviceType' => 'RTZ']]);
});

it('throws when the delivery point envelope reports KO', function (): void {
    MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        FindDeliveryPointsRequest::class => MockResponse::make([
            'return' => ['outcome' => 'KO', 'code' => 200],
        ], 200),
    ]);

    expect(fn () => makeDeliveryPointPostIt()->findDeliveryPoints('00152', 'RTZ'))
        ->toThrow(PostItApiException::class, 'delivery point [200]');
});

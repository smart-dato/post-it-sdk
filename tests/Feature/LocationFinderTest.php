<?php

declare(strict_types=1);

use Saloon\Enums\Method;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use SmartDato\PostIt\Data\LocationFinderQueryData;
use SmartDato\PostIt\Data\LocationFinderResponseData;
use SmartDato\PostIt\PostIt;
use SmartDato\PostIt\Requests\AuthRequest;
use SmartDato\PostIt\Requests\FindInternationalPudosRequest;

afterEach(fn () => MockClient::destroyGlobal());

function makePudoPostIt(): PostIt
{
    return new PostIt(
        baseUrl: 'https://api.test',
        clientId: 'cli-1',
        clientSecret: 'sec-1',
        scope: 'shipping',
        grantType: 'client_credentials',
    );
}

it('finds international PUDO points and passes the filters as query params', function (): void {
    $mock = MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        FindInternationalPudosRequest::class => MockResponse::make([
            'locations' => [
                ['url' => '/locations/8011-001043222', 'name' => 'Pääpostitalo', 'distance' => 208],
            ],
        ], 200),
    ]);

    $response = makePudoPostIt()->findInternationalPudos(new LocationFinderQueryData(
        countryCode: 'FI',
        addressLocality: 'helsinky',
    ));

    expect($response)->toBeInstanceOf(LocationFinderResponseData::class)
        ->and($response->locations)->toHaveCount(1)
        ->and($response->locations[0]['name'])->toBe('Pääpostitalo');

    $pending = $mock->findResponseByRequest(FindInternationalPudosRequest::class)?->getPendingRequest();

    expect($pending?->getMethod())->toBe(Method::GET)
        ->and($pending?->getUri()->getPath())->toBe('/postalandlogistics/parcel/locationFinder')
        ->and($pending?->query()->all())->toMatchArray([
            'countryCode' => 'FI', 'providerType' => 'parcel', 'addressLocality' => 'helsinky',
        ]);
});

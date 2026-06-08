<?php

declare(strict_types=1);

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use SmartDato\PostIt\Data\TransitTimeQueryData;
use SmartDato\PostIt\Data\TransitTimeResponseData;
use SmartDato\PostIt\PostIt;
use SmartDato\PostIt\Requests\AuthRequest;
use SmartDato\PostIt\Requests\GetTransitTimeRequest;

afterEach(fn () => MockClient::destroyGlobal());

function makeTransitPostIt(): PostIt
{
    return new PostIt(
        baseUrl: 'https://api.test',
        clientId: 'cli-1',
        clientSecret: 'sec-1',
        scope: 'shipping',
        grantType: 'client_credentials',
    );
}

it('calculates transit time and parses the timestamps', function (): void {
    $mock = MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        GetTransitTimeRequest::class => MockResponse::make([
            'header' => ['count' => 1],
            'body' => [[
                'result' => ['transittimes' => [[
                    'regionorigin' => 'CALABRIA', 'regiondestination' => 'ABRUZZO', 'product' => 'PBS',
                    'transittime' => '4', 'estimatedShippingDate' => '1669939200', 'estimatedDeliveryData' => '1670544000',
                ]]],
                'errors' => ['count' => 0, 'details' => []],
            ]],
        ], 200),
    ]);

    $response = makeTransitPostIt()->getTransitTime(new TransitTimeQueryData(
        acceptanceChannel: 'SDA',
        productCode: 'PBS',
        originZip: '88833',
        destinationZip: '64010',
        startDate: new DateTimeImmutable('@1669978592'),
    ));

    expect($response)->toBeInstanceOf(TransitTimeResponseData::class)
        ->and($response->transitTimes)->toHaveCount(1)
        ->and($response->transitTimes[0]->transitTime)->toBe(4)
        ->and($response->transitTimes[0]->originRegion)->toBe('CALABRIA')
        ->and($response->transitTimes[0]->estimatedDeliveryDate?->getTimestamp())->toBe(1670544000)
        ->and($response->errors)->toBe([]);

    /** @var array<string, mixed> $body */
    $body = $mock->findResponseByRequest(GetTransitTimeRequest::class)?->getPendingRequest()->body()->all() ?? [];

    expect($body['body'][0]['references']['products'])->toBe([['code' => 'PBS']])
        ->and($body['body'][0]['properties'])->toMatchArray([
            'capOri' => '88833', 'capDest' => '64010', 'overTimeLimit' => false, 'startDate' => '1669978592',
        ]);
});

it('surfaces error details from the response', function (): void {
    MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        GetTransitTimeRequest::class => MockResponse::make([
            'body' => [[
                'result' => ['transittimes' => []],
                'errors' => ['count' => 1, 'details' => [['cleartext' => 'Destination CAP not managed', 'codedtext' => 'E102']]],
            ]],
        ], 200),
    ]);

    $response = makeTransitPostIt()->getTransitTime(new TransitTimeQueryData(
        acceptanceChannel: 'SDA', productCode: 'PBS', originZip: '88833', destinationZip: '00000',
        startDate: new DateTimeImmutable('@1669978592'),
    ));

    expect($response->transitTimes)->toBe([])
        ->and($response->errors)->toBe(['Destination CAP not managed']);
});

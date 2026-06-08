<?php

declare(strict_types=1);

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use SmartDato\PostIt\Data\DepositsListFilterData;
use SmartDato\PostIt\Data\DepositsListResponseData;
use SmartDato\PostIt\PostIt;
use SmartDato\PostIt\Requests\AuthRequest;
use SmartDato\PostIt\Requests\ListDepositsRequest;

afterEach(fn () => MockClient::destroyGlobal());

function makeDepositsPostIt(): PostIt
{
    return new PostIt(
        baseUrl: 'https://api.test',
        clientId: 'cli-1',
        clientSecret: 'sec-1',
        scope: 'shipping',
        grantType: 'client_credentials',
    );
}

it('lists deposits with their status and motivation', function (): void {
    MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        ListDepositsRequest::class => MockResponse::make([
            'deposits' => ['item' => [[
                'shipmentId' => '1UW0CN3000088', 'shipmentIdItz' => '', 'depositDossier' => '0000000000',
                'depositStatus' => 'RELEASED', 'depositStatusDescription' => 'Released', 'receipt' => 'LUCA RUSSO',
                'sender' => 'ANTONIO ESPOSITO', 'multiplePackages' => '', 'packagesNumber' => '001',
                'motivationId' => 'INDERR', 'motivationDescription' => 'Incorrect address', 'releasable' => 'N',
                'shipmentStardDate' => '2021-05-14', 'startDate' => '2021-05-20', 'endDate' => '2021-05-22',
                'cdc' => 'CDC-00071141', 'product' => 'Postedelivery Business Standard',
                'releaseActionId' => 'AZ0002', 'releaseActionDescription' => 'Deliver to another address',
            ]]],
            'errorCode' => '', 'errorDescription' => '', 'result' => 'OK',
            'reasons' => ['item' => [
                ['status' => 'RECIPREF', 'description' => 'Rifiuto del destinatario'],
                ['status' => 'ADDRINC', 'reasonDescription' => 'Wrong address'],
            ]],
            'statusList' => ['item' => [['description' => 'Released', 'status' => 'RELEASED']]],
        ], 200),
    ]);

    $response = makeDepositsPostIt()->listDeposits(new DepositsListFilterData(dateFrom: '20210803', dateTo: '20210813'));

    expect($response)->toBeInstanceOf(DepositsListResponseData::class)
        ->and($response->result)->toBe('OK')
        ->and($response->deposits)->toHaveCount(1)
        ->and($response->deposits[0]->shipmentId)->toBe('1UW0CN3000088')
        ->and($response->deposits[0]->packagesNumber)->toBe(1)
        ->and($response->deposits[0]->releasable)->toBeFalse()
        ->and($response->deposits[0]->shipmentStartDate)->toBe('2021-05-14')
        ->and($response->deposits[0]->costCenter)->toBe('CDC-00071141')
        ->and($response->reasons[1])->toBe(['status' => 'ADDRINC', 'description' => 'Wrong address'])
        ->and($response->statuses[0])->toBe(['status' => 'RELEASED', 'description' => 'Released']);
});

it('omits cdc unless cost centres are supplied', function (): void {
    $mock = MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        ListDepositsRequest::class => MockResponse::make(['result' => 'OK'], 200),
    ]);

    makeDepositsPostIt()->listDeposits(new DepositsListFilterData(dateFrom: '20210803', dateTo: '20210813'));

    /** @var array<string, mixed> $body */
    $body = $mock->findResponseByRequest(ListDepositsRequest::class)?->getPendingRequest()->body()->all() ?? [];

    expect($body)->toBe([
        'dateFrom' => '20210803', 'dateTo' => '20210813', 'status' => '', 'depositReason' => '',
    ]);
});

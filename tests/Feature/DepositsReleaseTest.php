<?php

declare(strict_types=1);

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use SmartDato\PostIt\Data\DepositsReleaseData;
use SmartDato\PostIt\Data\DepositsReleaseResponseData;
use SmartDato\PostIt\Data\PickupAddressData;
use SmartDato\PostIt\Enums\ReleaseAction;
use SmartDato\PostIt\PostIt;
use SmartDato\PostIt\Requests\AuthRequest;
use SmartDato\PostIt\Requests\ReleaseDepositRequest;

afterEach(fn () => MockClient::destroyGlobal());

function makeReleasePostIt(): PostIt
{
    return new PostIt(
        baseUrl: 'https://api.test',
        clientId: 'cli-1',
        clientSecret: 'sec-1',
        scope: 'shipping',
        grantType: 'client_credentials',
    );
}

it('releases a deposit and exposes the per-barcode outcome', function (): void {
    MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        ReleaseDepositRequest::class => MockResponse::make([
            'description' => 'Deliver to another address',
            'result' => ['item' => [['errorDescription' => '', 'errorCode' => '', 'result' => 'OK', 'barcode' => '1UW0CN3000075']]],
        ], 200),
    ]);

    $response = makeReleasePostIt()->releaseDeposit(new DepositsReleaseData(
        shipmentId: '3UW0CK1000838',
        releaseAction: ReleaseAction::DeliverToAnotherAddress,
        address: new PickupAddressData(givenName: 'Carolyn Summers', town: 'hakavkuwafpohu'),
    ));

    expect($response)->toBeInstanceOf(DepositsReleaseResponseData::class)
        ->and($response->description)->toBe('Deliver to another address')
        ->and($response->items)->toHaveCount(1)
        ->and($response->items[0]->barcode)->toBe('1UW0CN3000075')
        ->and($response->items[0]->succeeded())->toBeTrue()
        ->and($response->failed())->toBe([]);
});

it('builds the releaseAct, shipmentId list and address envelopes', function (): void {
    $mock = MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        ReleaseDepositRequest::class => MockResponse::make(['result' => ['item' => [['result' => 'OK', 'barcode' => 'X']]]], 200),
    ]);

    makeReleasePostIt()->releaseDeposit(new DepositsReleaseData(
        shipmentId: '3UW0CK1000838',
        releaseAction: ReleaseAction::DeliverToAnotherAddress,
        address: new PickupAddressData(givenName: 'Carolyn Summers'),
    ));

    /** @var array<string, mixed> $body */
    $body = $mock->findResponseByRequest(ReleaseDepositRequest::class)?->getPendingRequest()->body()->all() ?? [];

    expect($body['releaseAct'])->toBe(['shipmentId' => '3UW0CK1000838', 'releaseAction' => 'AZ0002'])
        ->and($body['shipmentId'])->toBe(['item' => [['barcode' => '3UW0CK1000838']]])
        ->and($body['address']['item'][0]['givenName'])->toBe('Carolyn Summers');
});

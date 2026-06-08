<?php

declare(strict_types=1);

use Saloon\Enums\Method;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use SmartDato\PostIt\Data\NationsResponseData;
use SmartDato\PostIt\Exceptions\PostItApiException;
use SmartDato\PostIt\PostIt;
use SmartDato\PostIt\Requests\AuthRequest;
use SmartDato\PostIt\Requests\ListNationsRequest;

afterEach(fn () => MockClient::destroyGlobal());

function makeNationsPostIt(): PostIt
{
    return new PostIt(
        baseUrl: 'https://api.test',
        clientId: 'cli-1',
        clientSecret: 'sec-1',
        scope: 'shipping',
        grantType: 'client_credentials',
    );
}

it('lists nations and hydrates the response DTO', function (): void {
    MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        ListNationsRequest::class => MockResponse::make([
            'channel' => 'WEBSERVICES',
            'contractCode' => 'SFA-00608323',
            'countries' => [
                [
                    'iso4' => 'USA1', 'iso2' => 'US', 'active' => true, 'name' => 'United States',
                    'intName' => 'United States of America (the)', 'extraue' => true,
                    'states' => [['state_code' => 'NY', 'state_name' => 'New York']],
                    'products' => ['APT000903', 'APT000904'],
                ],
            ],
            'result' => ['errorCode' => 0, 'errorDescription' => 'OK'],
        ], 200),
    ]);

    $response = makeNationsPostIt()->listNations();

    expect($response)->toBeInstanceOf(NationsResponseData::class)
        ->and($response->channel)->toBe('WEBSERVICES')
        ->and($response->nations)->toHaveCount(1)
        ->and($response->nations[0]->iso4)->toBe('USA1')
        ->and($response->nations[0]->extraEu)->toBeTrue()
        ->and($response->nations[0]->states[0]->code)->toBe('NY')
        ->and($response->nations[0]->products)->toBe(['APT000903', 'APT000904']);
});

it('issues a GET with no body', function (): void {
    $mock = MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        ListNationsRequest::class => MockResponse::make(['countries' => []], 200),
    ]);

    makeNationsPostIt()->listNations();

    $pending = $mock->findResponseByRequest(ListNationsRequest::class)?->getPendingRequest();

    expect($pending?->getMethod())->toBe(Method::GET)
        ->and($pending?->getUri()->getPath())->toBe('/postalandlogistics/parcel/international/nations');
});

it('throws when the nations envelope reports an error', function (): void {
    MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        ListNationsRequest::class => MockResponse::make([
            'result' => ['errorCode' => 7, 'errorDescription' => 'Boom'],
        ], 200),
    ]);

    expect(fn () => makeNationsPostIt()->listNations())
        ->toThrow(PostItApiException::class, '[7] Boom');
});

<?php

declare(strict_types=1);

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use SmartDato\PostIt\Data\NationDetailsResponseData;
use SmartDato\PostIt\PostIt;
use SmartDato\PostIt\Requests\AuthRequest;
use SmartDato\PostIt\Requests\GetNationDetailsRequest;

afterEach(fn () => MockClient::destroyGlobal());

function makeNationDetailsPostIt(): PostIt
{
    return new PostIt(
        baseUrl: 'https://api.test',
        clientId: 'cli-1',
        clientSecret: 'sec-1',
        scope: 'shipping',
        grantType: 'client_credentials',
    );
}

it('fetches nation details and hydrates carriers and customs notes', function (): void {
    MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        GetNationDetailsRequest::class => MockResponse::make([
            'channel' => 'WEBSERVICES',
            'contractCode' => 'SFA-00608323',
            'countryCode' => 'FRA1',
            'carriers' => [
                'EURODIS' => [
                    'content' => [[
                        'content_code' => '91', 'content_type' => 'DOCUMENTS', 'content_allowed' => true,
                        'content_attachments' => [['attachment_name' => '', 'attachment_downlodable' => false]],
                        'delivery_times' => [['destination' => 'OTHER', 'min' => '1', 'max' => '3', 'default' => true]],
                    ]],
                    'delivery_info' => '',
                    'ldv_copies' => 1,
                ],
            ],
            'result' => ['errorCode' => 0, 'errorDescription' => 'OK'],
            'APT000904' => ['customs_info' => 'Free movement', 'general_info' => 'Forbidden items list'],
        ], 200),
    ]);

    $response = makeNationDetailsPostIt()->getNationDetails('FRA1', 'APT000904');

    expect($response)->toBeInstanceOf(NationDetailsResponseData::class)
        ->and($response->countryCode)->toBe('FRA1')
        ->and($response->carriers)->toHaveKey('EURODIS')
        ->and($response->carriers['EURODIS']->ldvCopies)->toBe(1)
        ->and($response->carriers['EURODIS']->contents[0]->type)->toBe('DOCUMENTS')
        ->and($response->carriers['EURODIS']->contents[0]->deliveryTimes[0]->max)->toBe('3')
        ->and($response->customsByProduct)->toHaveKey('APT000904')
        ->and($response->customsByProduct['APT000904']['customsInfo'])->toBe('Free movement');
});

it('sends the countryCode and productCode body', function (): void {
    $mock = MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        GetNationDetailsRequest::class => MockResponse::make(['countryCode' => 'FRA1'], 200),
    ]);

    makeNationDetailsPostIt()->getNationDetails('FRA1', 'APT000904');

    /** @var array<string, mixed> $body */
    $body = $mock->findResponseByRequest(GetNationDetailsRequest::class)?->getPendingRequest()->body()->all() ?? [];

    expect($body)->toBe(['countryCode' => 'FRA1', 'productCode' => 'APT000904']);
});

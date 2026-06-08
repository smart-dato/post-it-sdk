<?php

declare(strict_types=1);

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use SmartDato\PostIt\Data\TaricResponseData;
use SmartDato\PostIt\Exceptions\PostItApiException;
use SmartDato\PostIt\PostIt;
use SmartDato\PostIt\Requests\AuthRequest;
use SmartDato\PostIt\Requests\ListTaricRequest;

afterEach(fn () => MockClient::destroyGlobal());

function makeTaricPostIt(): PostIt
{
    return new PostIt(
        baseUrl: 'https://api.test',
        clientId: 'cli-1',
        clientSecret: 'sec-1',
        scope: 'shipping',
        grantType: 'client_credentials',
    );
}

it('lists TARIC codes and hydrates the response DTO', function (): void {
    MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        ListTaricRequest::class => MockResponse::make([
            'channel' => 'WEBSERVICES',
            'contractCode' => 'SFA-00608323',
            'taric' => [
                ['taric_code' => '9112000000', 'italian_description' => 'Casse', 'english_description' => 'Clock cases'],
                ['taric_code' => '9113000000', 'italian_description' => 'Cinturini', 'english_description' => 'Watch straps'],
            ],
            'result' => ['errorCode' => 0, 'errorDescription' => 'OK'],
        ], 200),
    ]);

    $response = makeTaricPostIt()->listTaric();

    expect($response)->toBeInstanceOf(TaricResponseData::class)
        ->and($response->taric)->toHaveCount(2)
        ->and($response->taric[0]->code)->toBe('9112000000')
        ->and($response->taric[1]->englishDescription)->toBe('Watch straps');
});

it('throws when the TARIC envelope reports an error', function (): void {
    MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        ListTaricRequest::class => MockResponse::make([
            'result' => ['errorCode' => 3, 'errorDescription' => 'Nope'],
        ], 200),
    ]);

    expect(fn () => makeTaricPostIt()->listTaric())
        ->toThrow(PostItApiException::class, '[3] Nope');
});

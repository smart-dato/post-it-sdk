<?php

declare(strict_types=1);

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use SmartDato\PostIt\Data\DigipodDownloadResponseData;
use SmartDato\PostIt\Data\DigipodRequestResponseData;
use SmartDato\PostIt\Exceptions\PostItApiException;
use SmartDato\PostIt\PostIt;
use SmartDato\PostIt\Requests\AuthRequest;
use SmartDato\PostIt\Requests\DownloadDigipodRequest;
use SmartDato\PostIt\Requests\RequestDigipodRequest;

afterEach(fn () => MockClient::destroyGlobal());

function makeDigipodPostIt(): PostIt
{
    return new PostIt(
        baseUrl: 'https://api.test',
        clientId: 'cli-1',
        clientSecret: 'sec-1',
        scope: 'shipping',
        grantType: 'client_credentials',
    );
}

it('requests a digipod and exposes per-barcode outcomes', function (): void {
    $mock = MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        RequestDigipodRequest::class => MockResponse::make([
            'result' => ['item' => [['errorDescription' => '', 'errorCode' => '', 'result' => 'OK', 'barcode' => '1UW0CK1000110']]],
        ], 200),
    ]);

    $response = makeDigipodPostIt()->requestDigipod(['1UW0CK1000110'], 'ac@jazo.il');

    expect($response)->toBeInstanceOf(DigipodRequestResponseData::class)
        ->and($response->items[0]->barcode)->toBe('1UW0CK1000110')
        ->and($response->items[0]->succeeded())->toBeTrue()
        ->and($response->failed())->toBe([]);

    /** @var array<string, mixed> $body */
    $body = $mock->findResponseByRequest(RequestDigipodRequest::class)?->getPendingRequest()->body()->all() ?? [];

    expect($body)->toBe([
        'mail' => 'ac@jazo.il',
        'barcode' => ['item' => [['barcode' => '1UW0CK1000110']]],
    ]);
});

it('downloads a digipod document and decodes the base64 payload', function (): void {
    MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        DownloadDigipodRequest::class => MockResponse::make([
            'attached' => base64_encode('PDF-BYTES'),
            'errorCode' => '', 'errorDescription' => '', 'filename' => 'digipod.pdf', 'result' => 'OK',
        ], 200),
    ]);

    $response = makeDigipodPostIt()->downloadDigipod('1UW0CN1000081');

    expect($response)->toBeInstanceOf(DigipodDownloadResponseData::class)
        ->and($response->filename)->toBe('digipod.pdf')
        ->and($response->contents())->toBe('PDF-BYTES');
});

it('throws when the digipod download is not available', function (): void {
    MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        DownloadDigipodRequest::class => MockResponse::make([
            'result' => 'KO', 'errorCode' => 'E0032', 'errorDescription' => 'DigiPOD not yet available',
        ], 200),
    ]);

    expect(fn () => makeDigipodPostIt()->downloadDigipod('1UW0CN1000081'))
        ->toThrow(PostItApiException::class, '[E0032] DigiPOD not yet available');
});

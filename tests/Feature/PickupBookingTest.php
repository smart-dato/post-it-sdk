<?php

declare(strict_types=1);

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use SmartDato\PostIt\Data\PickupAddressData;
use SmartDato\PostIt\Data\PickupBookingData;
use SmartDato\PostIt\Data\PickupBookingResponseData;
use SmartDato\PostIt\Data\PickupContentData;
use SmartDato\PostIt\Enums\BookingType;
use SmartDato\PostIt\Enums\PickupOperation;
use SmartDato\PostIt\Enums\TimeSlot;
use SmartDato\PostIt\Exceptions\PostItApiException;
use SmartDato\PostIt\PostIt;
use SmartDato\PostIt\Requests\AuthRequest;
use SmartDato\PostIt\Requests\BookPickupRequest;

afterEach(fn () => MockClient::destroyGlobal());

function makePickupPostIt(): PostIt
{
    return new PostIt(
        baseUrl: 'https://api.test',
        clientId: 'cli-1',
        clientSecret: 'sec-1',
        scope: 'shipping',
        grantType: 'client_credentials',
    );
}

function makePickupBooking(): PickupBookingData
{
    return new PickupBookingData(
        operation: PickupOperation::Add,
        bookingType: BookingType::Multiple,
        where: new PickupAddressData(
            givenName: 'Henrietta Hill', surname: 'Gene Bowen', streetNumber: '4', streetName: 'via colonnelle',
            town: 'castel gandolfo', region: 'RM', postCode: '00073', country: 'IT',
        ),
        pickupDate: '20201005',
        timeSlot: TimeSlot::Morning,
        contents: [new PickupContentData(containerType: 'B', quantity: 10, weightKg: 1, heightCm: 1, widthCm: 1, lengthCm: 1, description: 'pacchi')],
    );
}

it('books a pickup and returns the booking id', function (): void {
    MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        BookPickupRequest::class => MockResponse::make([
            'bookingId' => 'CP41503560',
            'result' => ['item' => [['result' => 'OK', 'errorCode' => '', 'errorDescription' => '']]],
        ], 200),
    ]);

    $response = makePickupPostIt()->bookPickup(makePickupBooking());

    expect($response)->toBeInstanceOf(PickupBookingResponseData::class)
        ->and($response->bookingId)->toBe('CP41503560')
        ->and($response->result)->toBe('OK');
});

it('throws when the booking result is KO', function (): void {
    MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        BookPickupRequest::class => MockResponse::make([
            'bookingId' => '',
            'result' => ['item' => [['result' => 'KO', 'errorCode' => 'E0013', 'errorDescription' => 'PICKUP data is mandatory']]],
        ], 200),
    ]);

    expect(fn () => makePickupPostIt()->bookPickup(makePickupBooking()))
        ->toThrow(PostItApiException::class, '[E0013] PICKUP data is mandatory');
});

it('wraps the booking item in the pickup.item envelope', function (): void {
    $mock = MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        BookPickupRequest::class => MockResponse::make([
            'bookingId' => 'CP1', 'result' => ['item' => [['result' => 'OK']]],
        ], 200),
    ]);

    makePickupPostIt()->bookPickup(makePickupBooking());

    /** @var array<string, mixed> $body */
    $body = $mock->findResponseByRequest(BookPickupRequest::class)?->getPendingRequest()->body()->all() ?? [];

    expect($body)->toHaveKey('pickup')
        ->and($body['pickup']['item'][0]['operation'])->toBe('I')
        ->and($body['pickup']['item'][0]['bookingType'])->toBe('RIT0003')
        ->and($body['pickup']['item'][0]['timeSlot'])->toBe('AM')
        ->and($body['pickup']['item'][0]['where']['item'][0]['town'])->toBe('castel gandolfo')
        ->and($body['pickup']['item'][0]['content']['item'][0])->toMatchArray([
            'containerType' => 'B', 'tipocontText' => 'pacchi', 'quantity' => 10,
        ]);
});

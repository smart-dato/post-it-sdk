<?php

declare(strict_types=1);

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use SmartDato\PostIt\Data\PickupReportFilterData;
use SmartDato\PostIt\Data\PickupReportResponseData;
use SmartDato\PostIt\Enums\BookingType;
use SmartDato\PostIt\PostIt;
use SmartDato\PostIt\Requests\AuthRequest;
use SmartDato\PostIt\Requests\GetPickupReportRequest;

afterEach(fn () => MockClient::destroyGlobal());

function makeReportPostIt(): PostIt
{
    return new PostIt(
        baseUrl: 'https://api.test',
        clientId: 'cli-1',
        clientSecret: 'sec-1',
        scope: 'shipping',
        grantType: 'client_credentials',
    );
}

it('lists pickups and statuses from the report', function (): void {
    MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        GetPickupReportRequest::class => MockResponse::make([
            'errorCode' => '', 'errorDescription' => '', 'result' => 'OK',
            'pickup' => ['item' => [[
                'channel' => 'Portale', 'bookingCode' => '0000001603', 'pickupAddress' => 'viale asia 90 00144 ROME RM',
                'isEditable' => '1', 'status' => 'BOOKED', 'statusDescription' => 'Booked', 'timeSlot' => 'AM',
                'pickupDate' => '2021-05-07', 'bookingType' => 'RIT0003', 'bookingId' => 'CP41504252', 'pickupId' => '212307650',
            ]]],
            'statusList' => ['item' => [['statusDescription' => 'In progress', 'status' => 'IN_PROGRESS']]],
        ], 200),
    ]);

    $response = makeReportPostIt()->getPickupReport(new PickupReportFilterData(
        dateFrom: '2021-05-01', dateTo: '2021-05-08', bookingType: BookingType::Multiple,
    ));

    expect($response)->toBeInstanceOf(PickupReportResponseData::class)
        ->and($response->result)->toBe('OK')
        ->and($response->pickups)->toHaveCount(1)
        ->and($response->pickups[0]->bookingId)->toBe('CP41504252')
        ->and($response->pickups[0]->isEditable)->toBeTrue()
        ->and($response->pickups[0]->status)->toBe('BOOKED')
        ->and($response->statuses[0])->toBe(['status' => 'IN_PROGRESS', 'description' => 'In progress']);
});

it('sends the filter under pickupFilter', function (): void {
    $mock = MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        GetPickupReportRequest::class => MockResponse::make(['result' => 'OK'], 200),
    ]);

    makeReportPostIt()->getPickupReport(new PickupReportFilterData(dateFrom: '2021-05-01'));

    /** @var array<string, mixed> $body */
    $body = $mock->findResponseByRequest(GetPickupReportRequest::class)?->getPendingRequest()->body()->all() ?? [];

    expect($body)->toHaveKey('pickupFilter')
        ->and($body['pickupFilter']['dateFrom'])->toBe('2021-05-01');
});

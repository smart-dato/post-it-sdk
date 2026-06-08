<?php

declare(strict_types=1);

use SmartDato\PostIt\Data\TrackingEventData;
use SmartDato\PostIt\Data\TrackingResponseData;
use SmartDato\PostIt\PostIt;

it('tracks a shipment against the live test environment', function (): void {
    $creds = postItIntegrationCredentials();

    $client = new PostIt(
        baseUrl: $creds['baseUrl'],
        clientId: $creds['clientId'],
        clientSecret: $creds['clientSecret'],
        scope: $creds['scope'],
        grantType: $creds['grantType'],
    );

    $waybillNumber = getenv('POST_IT_TEST_WAYBILL') ?: 'ZA123456789IT';

    $tracking = $client->trackShipment($waybillNumber);
    print_r($tracking);
    expect($tracking)->toBeInstanceOf(TrackingResponseData::class)
        ->and($tracking->waybillNumber)->toBeString();

    foreach ($tracking->events as $event) {
        expect($event)->toBeInstanceOf(TrackingEventData::class);
    }
})->skip(fn () => postItIntegrationCredentials() === null, postItMissingCredentialsMessage());

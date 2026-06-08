<?php

declare(strict_types=1);

use SmartDato\PostIt\Connector\PosteItalianeConnector;
use SmartDato\PostIt\Requests\AuthRequest;

it('exchanges live credentials for an access token', function (): void {
    $creds = postItIntegrationCredentials();

    $connector = new PosteItalianeConnector($creds['baseUrl'], $creds['clientId']);

    $response = $connector->send(new AuthRequest(
        clientId: $creds['clientId'],
        clientSecret: $creds['clientSecret'],
        scope: $creds['scope'],
        grantType: $creds['grantType'],
    ));

    expect($response->status())->toBe(200)
        ->and($response->json('access_token'))->toBeString()->not->toBeEmpty();
})->skip(fn () => postItIntegrationCredentials() === null, postItMissingCredentialsMessage());

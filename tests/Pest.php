<?php

declare(strict_types=1);

use SmartDato\PostIt\PostIt;

uses()->in(__DIR__);

/**
 * Credentials for the live Poste Italiane integration tests, or null when the
 * required env vars are absent (in which case those tests skip themselves).
 *
 * @return array{baseUrl: string, clientId: string, clientSecret: string, scope: string, grantType: string}|null
 */
function postItIntegrationCredentials(): ?array
{
    $clientId = getenv('POST_IT_TEST_CLIENT_ID') ?: null;
    $clientSecret = getenv('POST_IT_TEST_CLIENT_SECRET') ?: null;
    $scope = getenv('POST_IT_TEST_SCOPE') ?: null;

    if ($clientId === null || $clientSecret === null || $scope === null) {
        return null;
    }

    return [
        'baseUrl' => getenv('POST_IT_TEST_BASE_URL') ?: PostIt::TEST_BASE_URL,
        'clientId' => $clientId,
        'clientSecret' => $clientSecret,
        'scope' => $scope,
        'grantType' => getenv('POST_IT_TEST_GRANT_TYPE') ?: 'client_credentials',
    ];
}

function postItMissingCredentialsMessage(): string
{
    return 'Set POST_IT_TEST_CLIENT_ID, POST_IT_TEST_CLIENT_SECRET and POST_IT_TEST_SCOPE to run the live Poste integration tests.';
}

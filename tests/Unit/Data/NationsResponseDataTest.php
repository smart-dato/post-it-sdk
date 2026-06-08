<?php

declare(strict_types=1);

use SmartDato\PostIt\Data\NationsResponseData;
use SmartDato\PostIt\Exceptions\PostItApiException;

it('parses countries with states and products', function (): void {
    $response = NationsResponseData::fromArray([
        'channel' => 'WEBSERVICES',
        'contractCode' => 'CT',
        'countries' => [
            ['iso4' => 'TKL1', 'iso2' => 'TK', 'active' => true, 'name' => 'Tokelau', 'extraue' => true, 'states' => [], 'products' => []],
            [
                'iso4' => 'USA1', 'iso2' => 'US', 'active' => true, 'name' => 'United States',
                'intName' => 'United States of America (the)', 'extraue' => true,
                'states' => [['state_code' => 'NJ', 'state_name' => 'New Jersey']],
                'products' => ['APT000903', 'APT000904'],
            ],
        ],
        'result' => ['errorCode' => 0, 'errorDescription' => 'OK'],
    ]);

    expect($response->nations)->toHaveCount(2)
        ->and($response->nations[0]->intName)->toBeNull()
        ->and($response->nations[0]->states)->toBe([])
        ->and($response->nations[1]->intName)->toBe('United States of America (the)')
        ->and($response->nations[1]->states[0]->name)->toBe('New Jersey')
        ->and($response->nations[1]->products)->toBe(['APT000903', 'APT000904']);
});

it('treats a missing countries key as an empty list', function (): void {
    $response = NationsResponseData::fromArray(['channel' => 'WEBSERVICES', 'contractCode' => 'CT']);

    expect($response->nations)->toBe([]);
});

it('throws when the result envelope is non-zero', function (): void {
    expect(fn () => NationsResponseData::fromArray([
        'result' => ['errorCode' => 9, 'errorDescription' => 'Bad'],
    ]))->toThrow(PostItApiException::class, '[9] Bad');
});

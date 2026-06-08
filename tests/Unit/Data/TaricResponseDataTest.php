<?php

declare(strict_types=1);

use SmartDato\PostIt\Data\TaricResponseData;
use SmartDato\PostIt\Exceptions\PostItApiException;

it('parses TARIC rows', function (): void {
    $response = TaricResponseData::fromArray([
        'channel' => 'WEBSERVICES',
        'contractCode' => 'CT',
        'taric' => [
            ['taric_code' => '9112000000', 'italian_description' => 'Casse', 'english_description' => 'Clock cases'],
        ],
        'result' => ['errorCode' => 0],
    ]);

    expect($response->taric)->toHaveCount(1)
        ->and($response->taric[0]->code)->toBe('9112000000')
        ->and($response->taric[0]->italianDescription)->toBe('Casse')
        ->and($response->taric[0]->englishDescription)->toBe('Clock cases');
});

it('throws when the result envelope is non-zero', function (): void {
    expect(fn () => TaricResponseData::fromArray([
        'result' => ['errorCode' => 2, 'errorDescription' => 'Down'],
    ]))->toThrow(PostItApiException::class, '[2] Down');
});

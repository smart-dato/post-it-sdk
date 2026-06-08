<?php

declare(strict_types=1);

use SmartDato\PostIt\Data\NationDetailsResponseData;
use SmartDato\PostIt\Exceptions\PostItApiException;

it('parses carriers, content categories and customs notes', function (): void {
    $response = NationDetailsResponseData::fromArray([
        'channel' => 'WEBSERVICES',
        'contractCode' => 'CT',
        'countryCode' => 'FRA1',
        'carriers' => [
            'EURODIS' => [
                'content' => [[
                    'content_code' => '91', 'content_type' => 'DOCUMENTS', 'content_description' => '', 'content_allowed' => true,
                    'content_attachments' => [[
                        'attachment_name' => '', 'attachment_description' => '',
                        'attachment_downlodable' => false, 'attachment_copies_number' => 0, 'attachment_copies_number_dts' => 0,
                    ]],
                    'delivery_times' => [['destination' => 'OTHER', 'min' => '1', 'max' => '3', 'default' => true]],
                ]],
                'delivery_info' => 'No P.O. Boxes',
                'delivery_exception_info' => '',
                'ldv_copies' => 5,
            ],
        ],
        'result' => ['errorCode' => 0, 'errorDescription' => 'OK'],
        'APT000904' => ['customs_info' => 'Free movement', 'general_info' => 'Forbidden items'],
    ]);

    expect($response->countryCode)->toBe('FRA1')
        ->and($response->carriers)->toHaveKey('EURODIS')
        ->and($response->carriers['EURODIS']->deliveryInfo)->toBe('No P.O. Boxes')
        ->and($response->carriers['EURODIS']->deliveryExceptionInfo)->toBeNull()
        ->and($response->carriers['EURODIS']->ldvCopies)->toBe(5)
        ->and($response->carriers['EURODIS']->contents[0]->description)->toBeNull()
        ->and($response->carriers['EURODIS']->contents[0]->allowed)->toBeTrue()
        ->and($response->carriers['EURODIS']->contents[0]->attachments[0]->downloadable)->toBeFalse()
        ->and($response->carriers['EURODIS']->contents[0]->deliveryTimes[0]->default)->toBeTrue()
        ->and($response->customsByProduct['APT000904']['customsInfo'])->toBe('Free movement')
        ->and($response->customsByProduct['APT000904']['generalInfo'])->toBe('Forbidden items');
});

it('reads the alternate attachment_downloadable spelling', function (): void {
    $response = NationDetailsResponseData::fromArray([
        'carriers' => [
            'UPS' => [
                'content' => [[
                    'content_code' => '11', 'content_type' => 'GOODS FOR SALE', 'content_allowed' => true,
                    'content_attachments' => [['attachment_downloadable' => true]],
                    'delivery_times' => [],
                ]],
            ],
        ],
    ]);

    expect($response->carriers['UPS']->contents[0]->attachments[0]->downloadable)->toBeTrue();
});

it('throws when the result envelope is non-zero', function (): void {
    expect(fn () => NationDetailsResponseData::fromArray([
        'result' => ['errorCode' => 4, 'errorDescription' => 'No data'],
    ]))->toThrow(PostItApiException::class, '[4] No data');
});

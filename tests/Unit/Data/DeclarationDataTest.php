<?php

declare(strict_types=1);

use SmartDato\PostIt\Data\DeclarationData;
use SmartDato\PostIt\Data\ItemData;

it('serialises a domestic declaration with exactly the four dimensions', function (): void {
    $declaration = new DeclarationData(weightGrams: 1500, heightCm: 20, lengthCm: 30, widthCm: 40);

    expect($declaration->toArray())->toBe([
        'weight' => '1500',
        'height' => '20',
        'length' => '30',
        'width' => '40',
    ]);
});

it('adds the international declaration fields only when set', function (): void {
    $declaration = new DeclarationData(
        weightGrams: 3000,
        heightCm: 10,
        lengthCm: 50,
        widthCm: 25,
        description: 'Merce non destinata alla vendita',
        packagingCode: 'C',
        nationality: 'IT',
    );

    expect($declaration->toArray())->toBe([
        'weight' => '3000',
        'height' => '10',
        'length' => '50',
        'width' => '25',
        'description' => 'Merce non destinata alla vendita',
        'packagingCode' => 'C',
        'nationality' => 'IT',
    ]);
});

it('numbers customs items sequentially and stringifies them', function (): void {
    $declaration = new DeclarationData(
        weightGrams: 3000,
        heightCm: 10,
        lengthCm: 50,
        widthCm: 25,
        items: [
            new ItemData(taric: '6109100010', totalValueCents: 5000, quantity: 2, totalWeightGrams: 1500, originCountry: 'IT'),
            new ItemData(taric: '6203420000', totalValueCents: 9000, quantity: 1, totalWeightGrams: 1500, originCountry: 'DE'),
        ],
    );

    expect($declaration->toArray()['items'])->toBe([
        ['itemNumber' => '1', 'taric' => '6109100010', 'totalValue' => '5000', 'quantity' => '2', 'totalWeight' => '1500', 'originCountry' => 'IT'],
        ['itemNumber' => '2', 'taric' => '6203420000', 'totalValue' => '9000', 'quantity' => '1', 'totalWeight' => '1500', 'originCountry' => 'DE'],
    ]);
});

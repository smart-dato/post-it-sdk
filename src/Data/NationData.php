<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

/**
 * A single country entry from the nations extraction service.
 *
 * Maps `countries[]` of `GET /postalandlogistics/parcel/international/nations`.
 * `extraEu` mirrors the documented `extraue` flag (true for non-EU countries).
 */
final readonly class NationData
{
    /**
     * @param  array<StateData>  $states
     * @param  array<int, string>  $products  allowed APTUS product codes
     */
    public function __construct(
        public string $iso4,
        public string $iso2,
        public bool $active,
        public string $name,
        public ?string $intName,
        public bool $extraEu,
        public array $states,
        public array $products,
        public ?string $news = null,
    ) {}

    /**
     * @param  array<string, mixed>  $data
     */
    public static function fromArray(array $data): self
    {
        $states = [];
        foreach ($data['states'] ?? [] as $state) {
            if (is_array($state)) {
                $states[] = StateData::fromArray($state);
            }
        }

        $products = [];
        foreach ($data['products'] ?? [] as $product) {
            if (is_string($product) && $product !== '') {
                $products[] = $product;
            }
        }

        $news = $data['news'] ?? null;

        return new self(
            iso4: (string) ($data['iso4'] ?? ''),
            iso2: (string) ($data['iso2'] ?? ''),
            active: (bool) ($data['active'] ?? false),
            name: (string) ($data['name'] ?? ''),
            intName: isset($data['intName']) ? (string) $data['intName'] : null,
            extraEu: (bool) ($data['extraue'] ?? false),
            states: $states,
            products: $products,
            news: is_string($news) && $news !== '' ? $news : null,
        );
    }
}

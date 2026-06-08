<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

/**
 * Customs line item for an international parcel (`declared[].items[]`).
 *
 * Required for international products APT000904 and APT001013. The
 * `itemNumber` is assigned automatically from the item's position by
 * {@see DeclarationData::toArray()}.
 */
final readonly class ItemData
{
    public function __construct(
        public string $taric,
        public int $totalValueCents,
        public int $quantity,
        public int $totalWeightGrams,
        public string $originCountry,
    ) {}

    /**
     * @return array<string, string>
     */
    public function toArray(int $itemNumber): array
    {
        return [
            'itemNumber' => (string) $itemNumber,
            'taric' => $this->taric,
            'totalValue' => (string) $this->totalValueCents,
            'quantity' => (string) $this->quantity,
            'totalWeight' => (string) $this->totalWeightGrams,
            'originCountry' => $this->originCountry,
        ];
    }
}

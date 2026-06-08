<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

use SmartDato\PostIt\Data\Concerns\HasOutcomeEnvelope;

/**
 * Response of `POST /postalandlogistics/parcel/digipodRequest` — the per-barcode
 * outcome of requesting a digital proof of delivery.
 *
 * Per-barcode `KO` outcomes do not throw; inspect {@see self::$items} or
 * {@see self::failed()}.
 */
final readonly class DigipodRequestResponseData
{
    use HasOutcomeEnvelope;

    /**
     * @param  array<BarcodeOutcomeData>  $items
     */
    public function __construct(
        public array $items,
    ) {}

    /**
     * @param  array<string, mixed>  $response
     */
    public static function fromArray(array $response): self
    {
        $items = [];
        foreach (self::unwrapItems($response['result'] ?? []) as $item) {
            $items[] = BarcodeOutcomeData::fromArray($item);
        }

        return new self($items);
    }

    /**
     * @return array<BarcodeOutcomeData>
     */
    public function failed(): array
    {
        return array_values(array_filter($this->items, static fn (BarcodeOutcomeData $item): bool => ! $item->succeeded()));
    }
}

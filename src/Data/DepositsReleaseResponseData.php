<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

use SmartDato\PostIt\Data\Concerns\HasOutcomeEnvelope;

/**
 * Response of `POST /postalandlogistics/parcel/depositsRelease` — the release
 * action description and the per-barcode outcomes.
 *
 * A `KO` barcode does not throw (a multi-parcel release may partially succeed);
 * inspect {@see self::$items} or {@see self::failed()}.
 */
final readonly class DepositsReleaseResponseData
{
    use HasOutcomeEnvelope;

    /**
     * @param  array<DepositsReleaseItemData>  $items
     */
    public function __construct(
        public ?string $description,
        public array $items,
    ) {}

    /**
     * @param  array<string, mixed>  $response
     */
    public static function fromArray(array $response): self
    {
        $items = [];
        foreach (self::unwrapItems($response['result'] ?? []) as $item) {
            $items[] = DepositsReleaseItemData::fromArray($item);
        }

        return new self(
            description: self::stringOrNull($response['description'] ?? null),
            items: $items,
        );
    }

    /**
     * @return array<DepositsReleaseItemData>
     */
    public function failed(): array
    {
        return array_values(array_filter($this->items, static fn (DepositsReleaseItemData $item): bool => ! $item->succeeded()));
    }
}

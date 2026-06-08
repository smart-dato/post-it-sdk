<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

use DateTimeImmutable;

/**
 * A single calculated transit time (`body[].result.transittimes[]`).
 *
 * `estimatedDeliveryDate` maps the API's `estimatedDeliveryData`; both estimated
 * dates arrive as Unix timestamps in seconds and are parsed to `DateTimeImmutable`.
 */
final readonly class TransitTimeData
{
    public function __construct(
        public ?string $originRegion,
        public ?string $destinationRegion,
        public ?string $product,
        public ?int $transitTime,
        public ?DateTimeImmutable $estimatedShippingDate,
        public ?DateTimeImmutable $estimatedDeliveryDate,
    ) {}

    /**
     * @param  array<string, mixed>  $data
     */
    public static function fromArray(array $data): self
    {
        $transitTime = $data['transittime'] ?? null;

        return new self(
            originRegion: self::stringOrNull($data['regionorigin'] ?? null),
            destinationRegion: self::stringOrNull($data['regiondestination'] ?? null),
            product: self::stringOrNull($data['product'] ?? null),
            transitTime: is_numeric($transitTime) ? (int) $transitTime : null,
            estimatedShippingDate: self::parseTimestamp($data['estimatedShippingDate'] ?? null),
            estimatedDeliveryDate: self::parseTimestamp($data['estimatedDeliveryData'] ?? $data['estimatedDeliveryDate'] ?? null),
        );
    }

    private static function parseTimestamp(mixed $value): ?DateTimeImmutable
    {
        if (! is_numeric($value)) {
            return null;
        }

        return (new DateTimeImmutable)->setTimestamp((int) $value);
    }

    private static function stringOrNull(mixed $value): ?string
    {
        if (! is_string($value) || $value === '') {
            return null;
        }

        return $value;
    }
}

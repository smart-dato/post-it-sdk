<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

/**
 * Minimum/maximum transit time for a destination, as returned within a
 * carrier's content category (`delivery_times[]`). `destination` may be
 * `OTHER` to denote all remaining destinations within the country.
 */
final readonly class DeliveryTimeData
{
    public function __construct(
        public string $destination,
        public ?string $min,
        public ?string $max,
        public bool $default = false,
    ) {}

    /**
     * @param  array<string, mixed>  $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            destination: (string) ($data['destination'] ?? ''),
            min: isset($data['min']) ? (string) $data['min'] : null,
            max: isset($data['max']) ? (string) $data['max'] : null,
            default: (bool) ($data['default'] ?? false),
        );
    }
}

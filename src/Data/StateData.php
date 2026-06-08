<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

/**
 * A federal state / region of a country, as returned in the
 * `countries[].states[]` list of the nations extraction service (e.g. for
 * US and Canada destinations).
 */
final readonly class StateData
{
    public function __construct(
        public string $code,
        public string $name,
    ) {}

    /**
     * @param  array<string, mixed>  $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            code: (string) ($data['state_code'] ?? ''),
            name: (string) ($data['state_name'] ?? ''),
        );
    }
}

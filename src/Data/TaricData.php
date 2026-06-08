<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

/**
 * A single TARIC entry — customs code plus the goods description in Italian
 * and English. Used only for standard products shipped outside the EU.
 */
final readonly class TaricData
{
    public function __construct(
        public string $code,
        public string $italianDescription,
        public string $englishDescription,
    ) {}

    /**
     * @param  array<string, mixed>  $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            code: (string) ($data['taric_code'] ?? ''),
            italianDescription: (string) ($data['italian_description'] ?? ''),
            englishDescription: (string) ($data['english_description'] ?? ''),
        );
    }
}

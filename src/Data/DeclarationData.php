<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

/**
 * Per-parcel declared dimensions / weight.
 *
 * Poste Italiane expects integer strings (grams for weight, centimetres for
 * dimensions); convert from your domain units before constructing.
 */
final readonly class DeclarationData
{
    public function __construct(
        public int $weightGrams,
        public int $heightCm,
        public int $lengthCm,
        public int $widthCm,
    ) {}

    /**
     * @return array<string, string>
     */
    public function toArray(): array
    {
        return [
            'weight' => (string) $this->weightGrams,
            'height' => (string) $this->heightCm,
            'length' => (string) $this->lengthCm,
            'width' => (string) $this->widthCm,
        ];
    }
}

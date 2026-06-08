<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

/**
 * A container line of a pickup booking (`content.item[]`): its type, an
 * optional description, quantity and dimensions.
 *
 * `containerType` is `B` for an envelope or `P` for a parcel/pallet. Weight is
 * in kilograms; height, width and length are in centimetres.
 */
final readonly class PickupContentData
{
    public function __construct(
        public string $containerType,
        public int|float $quantity,
        public int|float $weightKg,
        public int|float $heightCm,
        public int|float $widthCm,
        public int|float $lengthCm,
        public ?string $description = null,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'containerType' => $this->containerType,
            'tipocontText' => $this->description ?? '',
            'quantity' => $this->quantity,
            'weight' => $this->weightKg,
            'height' => $this->heightCm,
            'width' => $this->widthCm,
            'length' => $this->lengthCm,
        ];
    }
}

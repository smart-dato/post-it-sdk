<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

/**
 * Per-parcel declared dimensions / weight, plus optional customs data for
 * international shipments.
 *
 * Poste Italiane expects integer strings (grams for weight, centimetres for
 * dimensions); convert from your domain units before constructing. The
 * `description`, `contentCode`, `packagingCode`, `nationality` and `items`
 * fields are only serialised when set, so domestic payloads stay unchanged.
 */
final readonly class DeclarationData
{
    /**
     * @param  array<ItemData>  $items
     */
    public function __construct(
        public int $weightGrams,
        public int $heightCm,
        public int $lengthCm,
        public int $widthCm,
        public ?string $description = null,
        public ?string $contentCode = null,
        public ?string $packagingCode = null,
        public ?string $nationality = null,
        public array $items = [],
    ) {}

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $data = [
            'weight' => (string) $this->weightGrams,
            'height' => (string) $this->heightCm,
            'length' => (string) $this->lengthCm,
            'width' => (string) $this->widthCm,
        ];

        if ($this->description !== null) {
            $data['description'] = $this->description;
        }

        if ($this->contentCode !== null) {
            $data['contentCode'] = $this->contentCode;
        }

        if ($this->packagingCode !== null) {
            $data['packagingCode'] = $this->packagingCode;
        }

        if ($this->nationality !== null) {
            $data['nationality'] = $this->nationality;
        }

        if ($this->items !== []) {
            $items = [];
            foreach ($this->items as $index => $item) {
                $items[] = $item->toArray($index + 1);
            }
            $data['items'] = $items;
        }

        return $data;
    }
}

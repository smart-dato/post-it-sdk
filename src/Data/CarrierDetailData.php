<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

/**
 * Per-carrier detail for a country/product, keyed by carrier name (EMS, EPG,
 * EURODIS, SPARX, UPS, …) in the nation-details response. Holds the allowed
 * content categories plus delivery notes and the number of label copies.
 */
final readonly class CarrierDetailData
{
    /**
     * @param  array<ContentTypeData>  $contents
     */
    public function __construct(
        public string $carrier,
        public array $contents,
        public ?string $deliveryInfo = null,
        public ?string $deliveryExceptionInfo = null,
        public ?int $ldvCopies = null,
    ) {}

    /**
     * @param  array<string, mixed>  $data
     */
    public static function fromArray(string $carrier, array $data): self
    {
        $contents = [];
        foreach ($data['content'] ?? [] as $content) {
            if (is_array($content)) {
                $contents[] = ContentTypeData::fromArray($content);
            }
        }

        return new self(
            carrier: $carrier,
            contents: $contents,
            deliveryInfo: self::stringOrNull($data['delivery_info'] ?? null),
            deliveryExceptionInfo: self::stringOrNull($data['delivery_exception_info'] ?? null),
            ldvCopies: isset($data['ldv_copies']) ? (int) $data['ldv_copies'] : null,
        );
    }

    private static function stringOrNull(mixed $value): ?string
    {
        if (! is_string($value) || $value === '') {
            return null;
        }

        return $value;
    }
}

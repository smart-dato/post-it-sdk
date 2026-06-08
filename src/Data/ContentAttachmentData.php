<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

/**
 * A document required/attached for a content category of an international
 * shipment (`content[].content_attachments[]`).
 *
 * Note: the API spells the downloadable flag `attachment_downlodable` in its
 * payloads (and `attachment_downloadable` in the field table); both are accepted.
 */
final readonly class ContentAttachmentData
{
    public function __construct(
        public ?string $name,
        public ?string $description,
        public bool $downloadable,
        public int $copiesNumber,
        public int $copiesNumberDts,
        public ?string $url = null,
    ) {}

    /**
     * @param  array<string, mixed>  $data
     */
    public static function fromArray(array $data): self
    {
        $downloadable = $data['attachment_downlodable'] ?? $data['attachment_downloadable'] ?? false;

        return new self(
            name: self::stringOrNull($data['attachment_name'] ?? null),
            description: self::stringOrNull($data['attachment_description'] ?? null),
            downloadable: (bool) $downloadable,
            copiesNumber: (int) ($data['attachment_copies_number'] ?? 0),
            copiesNumberDts: (int) ($data['attachment_copies_number_dts'] ?? 0),
            url: self::stringOrNull($data['attachment_url'] ?? null),
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

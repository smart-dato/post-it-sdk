<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

/**
 * A product category (`content[]`) allowed by a carrier for a country: its
 * code/type, whether it is permitted, the documents it requires and the
 * applicable transit times.
 */
final readonly class ContentTypeData
{
    /**
     * @param  array<ContentAttachmentData>  $attachments
     * @param  array<DeliveryTimeData>  $deliveryTimes
     */
    public function __construct(
        public string $code,
        public string $type,
        public ?string $description,
        public bool $allowed,
        public array $attachments,
        public array $deliveryTimes,
    ) {}

    /**
     * @param  array<string, mixed>  $data
     */
    public static function fromArray(array $data): self
    {
        $attachments = [];
        foreach ($data['content_attachments'] ?? [] as $attachment) {
            if (is_array($attachment)) {
                $attachments[] = ContentAttachmentData::fromArray($attachment);
            }
        }

        $deliveryTimes = [];
        foreach ($data['delivery_times'] ?? [] as $deliveryTime) {
            if (is_array($deliveryTime)) {
                $deliveryTimes[] = DeliveryTimeData::fromArray($deliveryTime);
            }
        }

        $description = $data['content_description'] ?? null;

        return new self(
            code: (string) ($data['content_code'] ?? ''),
            type: (string) ($data['content_type'] ?? ''),
            description: is_string($description) && $description !== '' ? $description : null,
            allowed: (bool) ($data['content_allowed'] ?? false),
            attachments: $attachments,
            deliveryTimes: $deliveryTimes,
        );
    }
}

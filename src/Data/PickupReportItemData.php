<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

/**
 * A single pickup entry from the pickup report (`pickup.item[]`).
 */
final readonly class PickupReportItemData
{
    public function __construct(
        public ?string $channel,
        public ?string $bookingCode,
        public ?string $pickupAddress,
        public ?string $insertDate,
        public ?string $insertTime,
        public ?string $modifyDate,
        public ?string $modifyTime,
        public bool $isEditable,
        public ?string $status,
        public ?string $statusDescription,
        public ?string $timeSlot,
        public ?string $pickupDate,
        public ?string $shipmentId,
        public ?string $customerShipmentId,
        public ?string $bookingType,
        public ?string $bookingId,
        public ?string $pickupId,
    ) {}

    /**
     * @param  array<string, mixed>  $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            channel: self::value($data, 'channel'),
            bookingCode: self::value($data, 'bookingCode'),
            pickupAddress: self::value($data, 'pickupAddress'),
            insertDate: self::value($data, 'insertDate'),
            insertTime: self::value($data, 'insertTime'),
            modifyDate: self::value($data, 'modifyDate'),
            modifyTime: self::value($data, 'modifyTime'),
            isEditable: ($data['isEditable'] ?? null) === '1' || ($data['isEditable'] ?? null) === true,
            status: self::value($data, 'status'),
            statusDescription: self::value($data, 'statusDescription'),
            timeSlot: self::value($data, 'timeSlot'),
            pickupDate: self::value($data, 'pickupDate'),
            shipmentId: self::value($data, 'shipmentId'),
            customerShipmentId: self::value($data, 'customerShipmentId'),
            bookingType: self::value($data, 'bookingType'),
            bookingId: self::value($data, 'bookingId'),
            pickupId: self::value($data, 'pickupId'),
        );
    }

    /**
     * @param  array<string, mixed>  $data
     */
    private static function value(array $data, string $key): ?string
    {
        $value = $data[$key] ?? null;

        if (! is_string($value) || $value === '') {
            return null;
        }

        return $value;
    }
}

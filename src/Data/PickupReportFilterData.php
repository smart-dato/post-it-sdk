<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

use SmartDato\PostIt\Enums\BookingType;

/**
 * Filter for the pickup report (`pickupFilter`). `dateFrom` is mandatory and
 * the date range may not exceed 10 days. Dates are passed through verbatim;
 * the API examples use the `YYYY-MM-DD` form.
 */
final readonly class PickupReportFilterData
{
    public function __construct(
        public string $dateFrom,
        public ?string $dateTo = null,
        public BookingType|string|null $bookingType = null,
        public ?string $bookingId = null,
        public ?string $pickupId = null,
        public ?string $shipmentId = null,
        public ?string $customerShipmentId = null,
        public ?string $status = null,
    ) {}

    /**
     * @return array<string, string>
     */
    public function toArray(): array
    {
        $bookingType = $this->bookingType instanceof BookingType ? $this->bookingType->value : $this->bookingType;

        return [
            'bookingType' => $bookingType ?? '',
            'bookingId' => $this->bookingId ?? '',
            'pickupId' => $this->pickupId ?? '',
            'shipmentId' => $this->shipmentId ?? '',
            'customerShipmentId' => $this->customerShipmentId ?? '',
            'dateFrom' => $this->dateFrom,
            'dateTo' => $this->dateTo ?? '',
            'status' => $this->status ?? '',
        ];
    }
}

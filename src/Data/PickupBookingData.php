<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

use SmartDato\PostIt\Enums\BookingType;
use SmartDato\PostIt\Enums\PickupOperation;
use SmartDato\PostIt\Enums\TimeSlot;

/**
 * A single pickup booking item (`pickup.item[]`). The request class wraps this
 * in the `{ "pickup": { "item": [ ... ] } }` envelope.
 *
 * `operation`, `bookingType` and `timeSlot` accept the typed enum or a raw
 * string. `pickupDate` is passed through verbatim; the API examples use the
 * `YYYYMMDD` form. `where` (the pickup location) is the only mandatory address.
 */
final readonly class PickupBookingData
{
    /**
     * @param  array<PickupContentData>  $contents
     */
    public function __construct(
        public PickupOperation|string $operation,
        public BookingType|string $bookingType,
        public PickupAddressData $where,
        public string $pickupDate,
        public TimeSlot|string $timeSlot,
        public array $contents = [],
        public ?PickupAddressData $sender = null,
        public ?PickupAddressData $receiver = null,
        public ?string $bookingId = null,
        public ?string $pickupId = null,
        public ?string $shipmentId = null,
        public ?string $customerShipmentId = null,
        public bool $bulky = false,
        public ?string $note1 = null,
        public ?string $note2 = null,
        public ?string $note3 = null,
        public bool $notify = false,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $contents = [];
        foreach ($this->contents as $content) {
            $contents[] = $content->toArray();
        }

        $item = [
            'operation' => $this->operation instanceof PickupOperation ? $this->operation->value : $this->operation,
            'bookingType' => $this->bookingType instanceof BookingType ? $this->bookingType->value : $this->bookingType,
            'bookingId' => $this->bookingId ?? '',
            'pickupId' => $this->pickupId ?? '',
            'shipmentId' => $this->shipmentId ?? '',
            'customerShipmentId' => $this->customerShipmentId ?? '',
            'sender' => ['item' => [($this->sender ?? new PickupAddressData)->toArray()]],
            'where' => ['item' => [$this->where->toArray()]],
            'receiver' => ['item' => [($this->receiver ?? new PickupAddressData)->toArray()]],
            'content' => ['item' => $contents],
            'bulky' => $this->bulky ? 'T' : '',
            'pickupDate' => $this->pickupDate,
            'timeSlot' => $this->timeSlot instanceof TimeSlot ? $this->timeSlot->value : $this->timeSlot,
            'note1' => $this->note1 ?? '',
            'note2' => $this->note2 ?? '',
            'note3' => $this->note3 ?? '',
            'contentImport' => '',
        ];

        if ($this->notify) {
            $item['notify'] = 'Y';
        }

        return $item;
    }
}

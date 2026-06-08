<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

use SmartDato\PostIt\Enums\ReleaseAction;

/**
 * Body for the deposits release request. `releaseAction` accepts the typed
 * enum or a raw string. `barcodes` defaults to the single `shipmentId`; pass
 * several to release a multi-parcel shipment. An `address` is required for the
 * "deliver to another address" action.
 */
final readonly class DepositsReleaseData
{
    /**
     * @param  array<int, string>  $barcodes
     */
    public function __construct(
        public string $shipmentId,
        public ReleaseAction|string $releaseAction,
        public array $barcodes = [],
        public ?PickupAddressData $address = null,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $barcodes = $this->barcodes === [] ? [$this->shipmentId] : $this->barcodes;

        $body = [
            'releaseAct' => [
                'shipmentId' => $this->shipmentId,
                'releaseAction' => $this->releaseAction instanceof ReleaseAction ? $this->releaseAction->value : $this->releaseAction,
            ],
            'shipmentId' => ['item' => array_map(static fn (string $barcode): array => ['barcode' => $barcode], $barcodes)],
        ];

        if ($this->address instanceof PickupAddressData) {
            $body['address'] = ['item' => [$this->address->toArray()]];
        }

        return $body;
    }
}

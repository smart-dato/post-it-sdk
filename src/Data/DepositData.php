<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

/**
 * A single deposited shipment from the deposits list (`deposits.item[]`).
 */
final readonly class DepositData
{
    public function __construct(
        public ?string $shipmentId,
        public ?string $shipmentIdItz,
        public ?string $customerShipmentId,
        public ?string $depositDossier,
        public ?string $depositStatus,
        public ?string $depositStatusDescription,
        public ?string $receipt,
        public ?string $sender,
        public bool $multiplePackages,
        public int $packagesNumber,
        public ?string $motivationId,
        public ?string $motivationDescription,
        public bool $releasable,
        public ?string $shipmentStartDate,
        public ?string $startDate,
        public ?string $endDate,
        public ?string $costCenter,
        public ?string $product,
        public ?string $releaseActionId,
        public ?string $releaseActionDescription,
    ) {}

    /**
     * @param  array<string, mixed>  $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            shipmentId: self::value($data, 'shipmentId'),
            shipmentIdItz: self::value($data, 'shipmentIdItz'),
            customerShipmentId: self::value($data, 'customerShipmentId'),
            depositDossier: self::value($data, 'depositDossier'),
            depositStatus: self::value($data, 'depositStatus'),
            depositStatusDescription: self::value($data, 'depositStatusDescription'),
            receipt: self::value($data, 'receipt'),
            sender: self::value($data, 'sender'),
            multiplePackages: strtoupper((string) ($data['multiplePackages'] ?? '')) === 'X',
            packagesNumber: (int) ($data['packagesNumber'] ?? 0),
            motivationId: self::value($data, 'motivationId'),
            motivationDescription: self::value($data, 'motivationDescription'),
            releasable: strtoupper((string) ($data['releasable'] ?? '')) === 'Y',
            shipmentStartDate: self::value($data, 'shipmentStardDate') ?? self::value($data, 'shipmentStartDate'),
            startDate: self::value($data, 'startDate'),
            endDate: self::value($data, 'endDate'),
            costCenter: self::value($data, 'cdc'),
            product: self::value($data, 'product'),
            releaseActionId: self::value($data, 'releaseActionId'),
            releaseActionDescription: self::value($data, 'releaseActionDescription'),
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

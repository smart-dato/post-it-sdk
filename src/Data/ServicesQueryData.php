<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

use DateTimeImmutable;
use DateTimeZone;
use SmartDato\PostIt\Enums\Product;

/**
 * Body for the extra-services and carrier extraction query (§5.6). Mirrors a
 * waybill request subset; reuses {@see DeclarationData} for parcels and
 * {@see InternationalData} for the international block.
 */
final readonly class ServicesQueryData
{
    /**
     * @param  array<DeclarationData>  $declared
     */
    public function __construct(
        public string $costCenterCode,
        public Product|string $product,
        public ServiceAddressData $sender,
        public ServiceAddressData $receiver,
        public array $declared,
        public ?string $cashAmount = null,
        public ?string $cashType = null,
        public ?DateTimeImmutable $declaredShipmentDate = null,
        public ?InternationalData $international = null,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $declared = [];
        foreach ($this->declared as $declaration) {
            $declared[] = $declaration->toArray();
        }

        $body = [
            'costCenterCode' => $this->costCenterCode,
            'product' => $this->product instanceof Product ? $this->product->value : $this->product,
            'sender' => $this->sender->toArray(),
            'receiver' => $this->receiver->toArray(),
            'declared' => $declared,
            'cashAmount' => $this->cashAmount ?? '',
            'cashType' => $this->cashType ?? '',
        ];

        if ($this->declaredShipmentDate instanceof DateTimeImmutable) {
            $body['declaredShipmentDate'] = $this->declaredShipmentDate->setTimezone(new DateTimeZone('UTC'))->format('Y-m-d\TH:i:s.vO');
        }

        if ($this->international instanceof InternationalData) {
            $body['international'] = $this->international->toArray();
        }

        return $body;
    }
}

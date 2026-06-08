<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

use SmartDato\PostIt\Enums\PrintFormat;
use SmartDato\PostIt\Enums\Product;

/**
 * Single waybill block inside a `CreateWaybill` request.
 *
 * Multiple waybills can be batched in one HTTP call by passing several of
 * these to {@see WaybillRequestData}. `printFormat` and `product` accept the
 * typed enums or a raw string for contract-specific values not yet modelled.
 */
final readonly class WaybillData
{
    /**
     * @param  array<DeclarationData>  $declared
     */
    public function __construct(
        public string $clientReferenceId,
        public PrintFormat|string $printFormat,
        public Product|string $product,
        public AddressData $sender,
        public AddressData $receiver,
        public array $declared,
        public string $content = 'goods',
        public ?ServicesData $services = null,
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

        return [
            'clientReferenceId' => $this->clientReferenceId,
            'printFormat' => $this->printFormat instanceof PrintFormat ? $this->printFormat->value : $this->printFormat,
            'product' => $this->product instanceof Product ? $this->product->value : $this->product,
            'data' => [
                'declared' => $declared,
                'content' => $this->content,
                'services' => $this->services instanceof ServicesData ? $this->services->toArray() : (object) [],
                'sender' => $this->sender->toArray(),
                'receiver' => $this->receiver->toArray(),
            ],
        ];
    }
}

<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

/**
 * Lean sender/receiver address used by the extra-services query (§5.6). Unlike
 * {@see AddressData} (the waybill address) it carries no name/contact fields.
 * `zipCode`, `city` and `country` (ISO 4) are required.
 */
final readonly class ServiceAddressData
{
    public function __construct(
        public string $zipCode,
        public string $city,
        public string $country,
        public ?string $streetNumber = null,
        public ?string $dug = null,
        public ?string $address = null,
        public ?string $addressId = null,
        public ?string $province = null,
        public ?string $email = null,
        public ?string $phone = null,
        public ?string $cellphone = null,
    ) {}

    /**
     * @return array<string, string>
     */
    public function toArray(): array
    {
        return [
            'zipCode' => $this->zipCode,
            'addressId' => $this->addressId ?? '',
            'streetNumber' => $this->streetNumber ?? '',
            'city' => $this->city,
            'dug' => $this->dug ?? '',
            'address' => $this->address ?? '',
            'country' => $this->country,
            'province' => $this->province ?? '',
            'email' => $this->email ?? '',
            'phone' => $this->phone ?? '',
            'cellphone' => $this->cellphone ?? '',
        ];
    }
}

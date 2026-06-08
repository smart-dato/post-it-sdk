<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

/**
 * Sender / receiver address payload as accepted by the Poste Italiane waybill
 * endpoint.
 *
 * The `country` and `countryName` defaults assume Italian domestic shipping;
 * override them only when the integration supports cross-border shipping.
 */
final readonly class AddressData
{
    public function __construct(
        public string $nameSurname,
        public string $contactName,
        public string $address,
        public string $streetNumber,
        public string $zipCode,
        public string $city,
        public string $cellphone,
        public string $phone,
        public ?string $email = null,
        public ?string $addressId = null,
        public string $country = 'ITA1',
        public string $countryName = 'Italia',
        public ?string $province = null,
    ) {}

    /**
     * @return array<string, string|null>
     */
    public function toArray(): array
    {
        $data = [
            'nameSurname' => $this->nameSurname,
            'contactName' => $this->contactName,
            'addressId' => $this->addressId,
            'address' => $this->address,
            'streetNumber' => $this->streetNumber,
            'zipCode' => $this->zipCode,
            'city' => $this->city,
            'country' => $this->country,
            'countryName' => $this->countryName,
            'email' => $this->email,
            'cellphone' => $this->cellphone,
            'phone' => $this->phone,
        ];

        if ($this->province !== null) {
            $data['province'] = $this->province;
        }

        return $data;
    }
}

<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

/**
 * Address block used for the pickup `sender` / `where` / `receiver` items and
 * for the deposits-release delivery address.
 *
 * Poste Italiane wraps each address in an `{ "item": [ ... ] }` envelope; that
 * wrapping is handled by the request classes. {@see self::toArray()} always
 * emits every documented key (empty string when unset) to mirror the API
 * examples, which send the full structure even for optional addresses.
 */
final readonly class PickupAddressData
{
    public function __construct(
        public ?string $givenName = null,
        public ?string $surname = null,
        public ?string $streetNumber = null,
        public ?string $streetName = null,
        public ?string $streetType = null,
        public ?string $floor = null,
        public ?string $town = null,
        public ?string $region = null,
        public ?string $postCode = null,
        public ?string $country = null,
        public ?string $km = null,
        public ?string $building = null,
        public ?string $stairs = null,
        public ?string $room = null,
        public ?string $internal = null,
        public ?string $reception = null,
        public ?string $phone = null,
        public ?string $email = null,
        public ?string $nameIntercom = null,
        public ?string $closingTimeFrom = null,
        public ?string $closingTimeTo = null,
    ) {}

    /**
     * @return array<string, string>
     */
    public function toArray(): array
    {
        return [
            'givenName' => $this->givenName ?? '',
            'surname' => $this->surname ?? '',
            'streetNumber' => $this->streetNumber ?? '',
            'streetName' => $this->streetName ?? '',
            'streetType' => $this->streetType ?? '',
            'floor' => $this->floor ?? '',
            'town' => $this->town ?? '',
            'region' => $this->region ?? '',
            'postCode' => $this->postCode ?? '',
            'country' => $this->country ?? '',
            'km' => $this->km ?? '',
            'building' => $this->building ?? '',
            'stairs' => $this->stairs ?? '',
            'room' => $this->room ?? '',
            'internal' => $this->internal ?? '',
            'reception' => $this->reception ?? '',
            'phone' => $this->phone ?? '',
            'email' => $this->email ?? '',
            'nameIntercom' => $this->nameIntercom ?? '',
            'closingTimeFrom' => $this->closingTimeFrom ?? '',
            'closingTimeTo' => $this->closingTimeTo ?? '',
        ];
    }
}

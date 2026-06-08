<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

/**
 * A single delivery point (post office / PuntoPoste / locker) from the delivery
 * point master data service. `latitude`/`longitude` map the API's
 * `XDegree`/`YDegree`. String values are trimmed (the API right-pads them).
 */
final readonly class DeliveryPointData
{
    public function __construct(
        public ?string $zipCode,
        public ?string $officeCode,
        public ?string $officeDescription,
        public ?string $address,
        public ?string $place,
        public ?string $openTimeMon,
        public ?string $openTimeSat,
        public ?string $closeTimeMon,
        public ?string $closeTimeSat,
        public ?string $saturationPercentage,
        public ?string $province,
        public ?string $phone,
        public ?string $latitude,
        public ?string $longitude,
    ) {}

    /**
     * @param  array<string, mixed>  $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            zipCode: self::value($data, 'zipCode'),
            officeCode: self::value($data, 'officeCode'),
            officeDescription: self::value($data, 'officeDescription'),
            address: self::value($data, 'address'),
            place: self::value($data, 'place'),
            openTimeMon: self::value($data, 'openTimeMon'),
            openTimeSat: self::value($data, 'openTimeSat'),
            closeTimeMon: self::value($data, 'closeTimeMon'),
            closeTimeSat: self::value($data, 'closeTimeSat'),
            saturationPercentage: self::value($data, 'saturationPercentage'),
            province: self::value($data, 'province'),
            phone: self::value($data, 'phone'),
            latitude: self::value($data, 'XDegree'),
            longitude: self::value($data, 'YDegree'),
        );
    }

    /**
     * @param  array<string, mixed>  $data
     */
    private static function value(array $data, string $key): ?string
    {
        $value = $data[$key] ?? null;

        if (! is_string($value)) {
            return null;
        }

        $trimmed = trim($value);

        return $trimmed === '' ? null : $trimmed;
    }
}

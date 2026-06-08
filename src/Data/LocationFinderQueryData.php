<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

/**
 * Query parameters for the international PUDO location finder (PDB International
 * Plus only). `providerType` must be `parcel`. The service proxies the DHL
 * location-finder API; see https://developer.dhl.com/api-reference/location-finder.
 */
final readonly class LocationFinderQueryData
{
    /**
     * @param  array<int, string>  $locationTypes
     * @param  array<int, string>  $serviceTypes
     */
    public function __construct(
        public string $countryCode,
        public ?string $addressLocality = null,
        public ?string $postalCode = null,
        public ?string $streetAddress = null,
        public string $providerType = 'parcel',
        public array $locationTypes = [],
        public array $serviceTypes = [],
        public ?int $radius = null,
        public ?int $limit = null,
        public ?bool $hideClosedLocations = null,
        public ?string $currentDate = null,
    ) {}

    /**
     * @return array<string, scalar|array<int, string>>
     */
    public function toArray(): array
    {
        $query = [
            'countryCode' => $this->countryCode,
            'providerType' => $this->providerType,
        ];

        if ($this->addressLocality !== null) {
            $query['addressLocality'] = $this->addressLocality;
        }

        if ($this->postalCode !== null) {
            $query['postalCode'] = $this->postalCode;
        }

        if ($this->streetAddress !== null) {
            $query['streetAddress'] = $this->streetAddress;
        }

        if ($this->locationTypes !== []) {
            $query['locationType'] = $this->locationTypes;
        }

        if ($this->serviceTypes !== []) {
            $query['serviceType'] = $this->serviceTypes;
        }

        if ($this->radius !== null) {
            $query['radius'] = $this->radius;
        }

        if ($this->limit !== null) {
            $query['limit'] = $this->limit;
        }

        if ($this->hideClosedLocations !== null) {
            $query['hideClosedLocations'] = $this->hideClosedLocations ? 'true' : 'false';
        }

        if ($this->currentDate !== null) {
            $query['currentDate'] = $this->currentDate;
        }

        return $query;
    }
}

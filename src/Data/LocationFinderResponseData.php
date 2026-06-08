<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

/**
 * Response of the international PUDO location finder.
 *
 * The payload is a DHL location-finder passthrough whose structure follows
 * DHL's schema (and may evolve), so locations are exposed as raw associative
 * arrays rather than a rigid DTO. Each entry carries `url`, `location`, `name`,
 * `distance`, `place` (address + geo), `openingHours`, `closurePeriods` and
 * `serviceTypes`.
 */
final readonly class LocationFinderResponseData
{
    /**
     * @param  array<int, array<string, mixed>>  $locations
     */
    public function __construct(
        public array $locations,
    ) {}

    /**
     * @param  array<string, mixed>  $response
     */
    public static function fromArray(array $response): self
    {
        $locations = [];
        foreach ($response['locations'] ?? [] as $location) {
            if (is_array($location)) {
                $locations[] = $location;
            }
        }

        return new self($locations);
    }
}

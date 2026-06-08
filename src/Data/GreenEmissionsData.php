<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

/**
 * The aggregated emissions block of the Green Index response (`emissioni`).
 */
final readonly class GreenEmissionsData
{
    /**
     * @param  array<GreenPhaseData>  $matrix
     * @param  array<int, string>  $costCenters
     * @param  array<int, string>  $products
     */
    public function __construct(
        public ?float $comparator,
        public ?float $totalEmissions,
        public ?float $totalShipmentsComputed,
        public ?float $totalShipmentsEntrusted,
        public ?float $nationalBrown,
        public ?float $lowEmissionVehicles,
        public ?float $totalKm,
        public ?float $averageEmissionsPerShipment,
        public ?float $averageKm,
        public ?string $updatedAt,
        public array $matrix,
        public array $costCenters,
        public array $products,
    ) {}

    /**
     * @param  array<string, mixed>  $data
     */
    public static function fromArray(array $data): self
    {
        $matrix = [];
        foreach ($data['matrice'] ?? [] as $phase) {
            if (is_array($phase)) {
                $matrix[] = GreenPhaseData::fromArray($phase);
            }
        }

        return new self(
            comparator: self::float($data['comparatore'] ?? null),
            totalEmissions: self::float($data['tot_emissioni'] ?? null),
            totalShipmentsComputed: self::float($data['tot_spedizioni_calcolate'] ?? null),
            totalShipmentsEntrusted: self::float($data['tot_spedizioni_affidate'] ?? null),
            nationalBrown: self::float($data['nazionale_brown'] ?? null),
            lowEmissionVehicles: self::float($data['veicoli_basse_emissioni'] ?? null),
            totalKm: self::float($data['tot_km'] ?? null),
            averageEmissionsPerShipment: self::float($data['media_emissioni_spedizione'] ?? null),
            averageKm: self::float($data['media_km'] ?? null),
            updatedAt: is_string($data['data_aggiornamento'] ?? null) && $data['data_aggiornamento'] !== '' ? $data['data_aggiornamento'] : null,
            matrix: $matrix,
            costCenters: self::stringList($data['cdc'] ?? null),
            products: self::stringList($data['prodotto'] ?? null),
        );
    }

    private static function float(mixed $value): ?float
    {
        return is_numeric($value) ? (float) $value : null;
    }

    /**
     * @return array<int, string>
     */
    private static function stringList(mixed $value): array
    {
        if (! is_array($value)) {
            return [];
        }

        return array_values(array_filter($value, 'is_string'));
    }
}

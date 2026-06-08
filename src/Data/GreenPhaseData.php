<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

/**
 * Per-phase emissions row of the Green Index matrix (`emissioni.matrice[]`).
 * Phase is one of `Ritiro/Accettazione`, `Trasporto`, `Consegna`.
 */
final readonly class GreenPhaseData
{
    public function __construct(
        public ?string $phase,
        public ?float $tonKm,
        public ?int $totalLdv,
        public ?float $totalEmissionsGhg,
        public ?float $lowEmissionVehiclesPercent,
        public ?float $averageEmissionsPerPackage,
        public ?float $averageEmissionsPerTonKm,
        public ?float $phaseEmissionsPercent,
    ) {}

    /**
     * @param  array<string, mixed>  $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            phase: is_string($data['fase'] ?? null) ? $data['fase'] : null,
            tonKm: self::float($data['tonn_km'] ?? null),
            totalLdv: isset($data['tot_ldv']) && is_numeric($data['tot_ldv']) ? (int) $data['tot_ldv'] : null,
            totalEmissionsGhg: self::float($data['tot_emissioni_ghg'] ?? null),
            lowEmissionVehiclesPercent: self::float($data['perc_veicoli_basse_emissioni'] ?? null),
            averageEmissionsPerPackage: self::float($data['media_emissioni_pacco'] ?? null),
            averageEmissionsPerTonKm: self::float($data['media_emissioni_tkm'] ?? null),
            phaseEmissionsPercent: self::float($data['perc_emissioni_fase'] ?? null),
        );
    }

    private static function float(mixed $value): ?float
    {
        return is_numeric($value) ? (float) $value : null;
    }
}

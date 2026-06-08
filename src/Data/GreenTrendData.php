<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

/**
 * A yearly emissions trend (`trend[]`) with its monthly detail.
 */
final readonly class GreenTrendData
{
    /**
     * @param  array<int, array{month: ?string, ytd: ?float, monthlyEmissions: ?float, monthlyVariation: ?float, monthlyShipments: ?int}>  $details
     */
    public function __construct(
        public ?string $year,
        public ?float $yoy,
        public ?float $annualEmissions,
        public ?float $averageEmissions,
        public array $details,
    ) {}

    /**
     * @param  array<string, mixed>  $data
     */
    public static function fromArray(array $data): self
    {
        $details = [];
        foreach ($data['dettaglio'] ?? [] as $detail) {
            if (! is_array($detail)) {
                continue;
            }
            $details[] = [
                'month' => is_string($detail['mese'] ?? null) ? $detail['mese'] : null,
                'ytd' => self::float($detail['ytd'] ?? null),
                'monthlyEmissions' => self::float($detail['emissioni_mensili'] ?? null),
                'monthlyVariation' => self::float($detail['variazioni_mensili'] ?? null),
                'monthlyShipments' => isset($detail['spedizioni_mensili']) && is_numeric($detail['spedizioni_mensili']) ? (int) $detail['spedizioni_mensili'] : null,
            ];
        }

        return new self(
            year: is_string($data['anno'] ?? null) ? $data['anno'] : null,
            yoy: self::float($data['yoy'] ?? null),
            annualEmissions: self::float($data['emissioni_annuali'] ?? null),
            averageEmissions: self::float($data['emissioni_medie'] ?? null),
            details: $details,
        );
    }

    private static function float(mixed $value): ?float
    {
        return is_numeric($value) ? (float) $value : null;
    }
}

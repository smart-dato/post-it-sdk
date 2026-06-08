<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

/**
 * Response of `POST /postalandlogistics/parcel/gibp/dashboardGreenMeter` — the
 * Green Index dashboard: aggregated emissions, the per-phase matrix and the
 * yearly trend.
 */
final readonly class GreenIndexResponseData
{
    /**
     * @param  array<GreenTrendData>  $trends
     */
    public function __construct(
        public ?string $timestamp,
        public ?string $customerCode,
        public ?GreenEmissionsData $emissions,
        public array $trends,
    ) {}

    /**
     * @param  array<string, mixed>  $response
     */
    public static function fromArray(array $response): self
    {
        $emissions = isset($response['emissioni']) && is_array($response['emissioni'])
            ? GreenEmissionsData::fromArray($response['emissioni'])
            : null;

        $trends = [];
        foreach ($response['trend'] ?? [] as $trend) {
            if (is_array($trend)) {
                $trends[] = GreenTrendData::fromArray($trend);
            }
        }

        return new self(
            timestamp: is_string($response['timestamp'] ?? null) && $response['timestamp'] !== '' ? $response['timestamp'] : null,
            customerCode: is_string($response['codice_cliente'] ?? null) && $response['codice_cliente'] !== '' ? $response['codice_cliente'] : null,
            emissions: $emissions,
            trends: $trends,
        );
    }
}

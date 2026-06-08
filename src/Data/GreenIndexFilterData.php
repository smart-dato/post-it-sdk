<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

/**
 * Filter (`filtri`) for the Green Index dashboard. `acceptanceTypes` and
 * `deliveryTypes` are required and default to `["TUTTE"]` (all). Each accepts
 * `TUTTE`, `A domicilio`, `Ufficio Postale` or `PuntoPoste`. Dates use the
 * `YYYY-MM-DD` form.
 */
final readonly class GreenIndexFilterData
{
    /**
     * @param  array<int, string>  $acceptanceTypes
     * @param  array<int, string>  $deliveryTypes
     * @param  array<int, string>  $costCenters
     * @param  array<int, string>  $products
     */
    public function __construct(
        public array $acceptanceTypes = ['TUTTE'],
        public array $deliveryTypes = ['TUTTE'],
        public array $costCenters = [],
        public array $products = [],
        public ?string $originZip = null,
        public ?string $destinationZip = null,
        public ?string $dateFrom = null,
        public ?string $dateTo = null,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $filters = [
            'tipo_accettazione' => $this->acceptanceTypes,
            'tipo_consegna' => $this->deliveryTypes,
        ];

        if ($this->costCenters !== []) {
            $filters['cdc'] = $this->costCenters;
        }

        if ($this->products !== []) {
            $filters['prodotto'] = $this->products;
        }

        if ($this->originZip !== null) {
            $filters['partenza'] = $this->originZip;
        }

        if ($this->destinationZip !== null) {
            $filters['destinazione'] = $this->destinationZip;
        }

        if ($this->dateFrom !== null) {
            $filters['data_inizio'] = $this->dateFrom;
        }

        if ($this->dateTo !== null) {
            $filters['data_fine'] = $this->dateTo;
        }

        return ['filtri' => $filters];
    }
}

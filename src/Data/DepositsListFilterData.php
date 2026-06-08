<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

/**
 * Filter for the deposits list. The date range may not exceed 10 days. Dates
 * are passed through verbatim; the API examples use the `YYYYMMDD` form.
 *
 * `status` accepts `RECIPREF`, `RECIPNOTID`, `ADDRINC` or `ABSRECIP`;
 * `depositReason` accepts `IN STORAGE`, `RELEASED`, `EXPIRED` or `REQUESTED`.
 */
final readonly class DepositsListFilterData
{
    /**
     * @param  array<int, string>  $costCenters
     */
    public function __construct(
        public ?string $dateFrom = null,
        public ?string $dateTo = null,
        public ?string $status = null,
        public ?string $depositReason = null,
        public ?string $depositDateFrom = null,
        public ?string $depositDateTo = null,
        public array $costCenters = [],
    ) {}

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $body = [
            'dateFrom' => $this->dateFrom ?? '',
            'dateTo' => $this->dateTo ?? '',
            'status' => $this->status ?? '',
            'depositReason' => $this->depositReason ?? '',
        ];

        if ($this->depositDateFrom !== null) {
            $body['depositDateFrom'] = $this->depositDateFrom;
        }

        if ($this->depositDateTo !== null) {
            $body['depositDateTo'] = $this->depositDateTo;
        }

        if ($this->costCenters !== []) {
            $body['cdc'] = ['item' => array_map(static fn (string $cdc): array => ['cdc' => $cdc], $this->costCenters)];
        }

        return $body;
    }
}

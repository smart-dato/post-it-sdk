<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

use DateTimeImmutable;
use DateTimeZone;

/**
 * Top-level body for `POST /postalandlogistics/parcel/waybill`.
 *
 * Wraps one or more waybills and the cost-centre under which they are billed.
 */
final readonly class WaybillRequestData
{
    /**
     * @param  array<WaybillData>  $waybills
     */
    public function __construct(
        public string $costCenterCode,
        public DateTimeImmutable $shipmentDate,
        public array $waybills,
        public bool $paperless = false,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $waybills = [];
        foreach ($this->waybills as $waybill) {
            $waybills[] = $waybill->toArray();
        }

        return [
            'costCenterCode' => $this->costCenterCode,
            'shipmentDate' => $this->shipmentDate->setTimezone(new DateTimeZone('UTC'))->format('Y-m-d\TH:i:s.vO'),
            'paperless' => $this->paperless ? 'true' : 'false',
            'waybills' => $waybills,
        ];
    }
}

<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

use DateTimeImmutable;

/**
 * A single transit-time query. The request class wraps this in the
 * `{ "body": [ ... ] }` envelope.
 *
 * Dates are sent as Unix timestamps in seconds (GMT). `acceptanceDate` is
 * required only for the `PP` acceptance channel and, when given, must be on or
 * before `startDate`. `acceptanceChannel` is one of `UP`, `RPP`, `SDA`.
 */
final readonly class TransitTimeQueryData
{
    public function __construct(
        public string $acceptanceChannel,
        public string $productCode,
        public string $originZip,
        public string $destinationZip,
        public DateTimeImmutable $startDate,
        public ?DateTimeImmutable $acceptanceDate = null,
        public ?string $fractionalOffice = null,
        public ?string $eid = null,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $properties = [
            'capOri' => $this->originZip,
            'capDest' => $this->destinationZip,
            'frazionario' => $this->fractionalOffice ?? '',
            'overTimeLimit' => false,
            'startDate' => (string) $this->startDate->getTimestamp(),
        ];

        if ($this->acceptanceDate instanceof DateTimeImmutable) {
            $properties['acceptanceDate'] = (string) $this->acceptanceDate->getTimestamp();
        }

        return [
            'references' => [
                'eid' => $this->eid ?? '',
                'acceptanceChannel' => $this->acceptanceChannel,
                'products' => [['code' => $this->productCode]],
                'channel' => '',
            ],
            'properties' => $properties,
        ];
    }
}

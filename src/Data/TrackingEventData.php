<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

use DateTimeImmutable;

/**
 * Single tracking event extracted from the Poste Italiane tracking response.
 *
 * Maps the documented `shipment[].tracking[]` entry: `status` →
 * {@see self::statusCode}, `StatusDescription` → {@see self::statusDescription},
 * `officeDescription` → {@see self::location}, `data` → {@see self::occurredAt}.
 * Fields are nullable because individual entries may omit them.
 */
final readonly class TrackingEventData
{
    public function __construct(
        public ?string $statusCode,
        public ?string $statusDescription,
        public ?string $location,
        public ?DateTimeImmutable $occurredAt,
        public ?string $phase = null,
        public ?string $synthesisStatusDescription = null,
    ) {}
}

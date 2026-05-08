<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

use DateTimeImmutable;

/**
 * Single tracking event extracted from the Poste Italiane tracking response.
 *
 * The upstream payload shape is loosely documented and varies between products
 * (postal vs courier). Fields are deliberately nullable; consumers are expected
 * to render whatever is present.
 */
final readonly class TrackingEventData
{
    public function __construct(
        public ?string $statusCode,
        public ?string $statusDescription,
        public ?string $location,
        public ?DateTimeImmutable $occurredAt,
    ) {}
}

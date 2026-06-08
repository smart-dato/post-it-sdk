<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Enums;

use SmartDato\PostIt\Enums\Concerns\MakesEnum;

/**
 * Type of pickup booking. `shipmentId` is mandatory for the single and
 * paperless variants.
 */
enum BookingType: string
{
    use MakesEnum;

    case Single = 'RIT0001';

    case Paperless = 'RIT0002';

    case Multiple = 'RIT0003';

    public function label(): string
    {
        return match ($this) {
            self::Single => 'Single',
            self::Paperless => 'Paperless',
            self::Multiple => 'Multiple',
        };
    }
}

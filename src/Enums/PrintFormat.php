<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Enums;

use SmartDato\PostIt\Enums\Concerns\MakesEnum;

/**
 * Print format for the `printFormat` field of waybill requests.
 *
 * Poste Italiane may accept contract-specific values; where your account uses
 * one not listed here, the waybill DTOs still accept a raw string.
 */
enum PrintFormat: string
{
    use MakesEnum;

    case A4 = 'A4';

    case FORMAT_1011 = '1011';

    case ZPL = 'ZPL';

    public static function default(): self
    {
        return self::FORMAT_1011;
    }
}

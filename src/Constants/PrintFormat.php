<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Constants;

/**
 * Print format values for the `printFormat` field of waybill requests.
 *
 * The exact set may vary by contract — pass a raw string if your account
 * uses a value not listed here.
 */
final class PrintFormat
{
    public const string A4 = 'A4';

    public const string FORMAT_1011 = '1011';

    public const string ZPL = 'ZPL';

    public const string DEFAULT = self::FORMAT_1011;
}

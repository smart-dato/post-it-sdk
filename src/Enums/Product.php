<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Enums;

use SmartDato\PostIt\Enums\Concerns\MakesEnum;

/**
 * Poste Delivery Business products, identified by their APTUS code.
 *
 * Reverse variants reuse the Express/Standard codes and are distinguished by
 * the reverse extra service (APT000928), so they have no dedicated case here.
 */
enum Product: string
{
    use MakesEnum;

    case Express = 'APT000901';

    case Standard = 'APT000902';

    case InternationalExpress = 'APT000903';

    case InternationalStandard = 'APT000904';

    case InternationalPlus = 'APT001013';

    public function label(): string
    {
        return match ($this) {
            self::Express => 'PosteDelivery Business Express',
            self::Standard => 'PosteDelivery Business Standard',
            self::InternationalExpress => 'PosteDelivery Business Internazionale Express',
            self::InternationalStandard => 'PosteDelivery Business Internazionale Standard',
            self::InternationalPlus => 'PosteDelivery Business International Plus',
        };
    }

    public function isInternational(): bool
    {
        return match ($this) {
            self::InternationalExpress, self::InternationalStandard, self::InternationalPlus => true,
            self::Express, self::Standard => false,
        };
    }
}

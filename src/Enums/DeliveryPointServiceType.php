<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Enums;

use SmartDato\PostIt\Enums\Concerns\MakesEnum;

/**
 * Type of extra service used to filter the delivery-point master data lookup.
 */
enum DeliveryPointServiceType: string
{
    use MakesEnum;

    case PuntoPosteLocker = 'APT';

    case PoBox = 'CPT';

    case PosteRestante = 'FMP';

    case PuntoPoste = 'RTZ';

    public function label(): string
    {
        return match ($this) {
            self::PuntoPosteLocker => 'PuntoPoste - Locker',
            self::PoBox => 'P.O. Box',
            self::PosteRestante => 'Poste Restante',
            self::PuntoPoste => 'PuntoPoste',
        };
    }
}

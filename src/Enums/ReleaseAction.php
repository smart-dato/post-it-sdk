<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Enums;

use SmartDato\PostIt\Enums\Concerns\MakesEnum;

/**
 * Action requested when releasing a deposited shipment
 * (`releaseAct.releaseAction` of the deposits release request).
 */
enum ReleaseAction: string
{
    use MakesEnum;

    case Redeliver = 'AZ0001';

    case DeliverToAnotherAddress = 'AZ0002';

    case AbandonShipment = 'AZ0003';

    case PostOffice = 'AZ0004';

    case ReturnToSender = 'AZ0005';

    case HoldInStorage = 'AZ0006';

    case PuntoPosteLocker = 'AZ0007';

    case PuntoPoste = 'AZ0008';

    public function label(): string
    {
        return match ($this) {
            self::Redeliver => 'Redeliver',
            self::DeliverToAnotherAddress => 'Deliver to another address',
            self::AbandonShipment => 'Abandon shipment',
            self::PostOffice => 'Post Office',
            self::ReturnToSender => 'Return to Sender',
            self::HoldInStorage => 'Hold in Storage',
            self::PuntoPosteLocker => 'Punto Poste - Locker',
            self::PuntoPoste => 'Punto Poste',
        };
    }

    /**
     * Release actions that require an `officeId` to be supplied.
     */
    public function requiresOfficeId(): bool
    {
        return match ($this) {
            self::PostOffice, self::PuntoPosteLocker, self::PuntoPoste => true,
            default => false,
        };
    }
}

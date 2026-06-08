<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Enums;

use SmartDato\PostIt\Enums\Concerns\MakesEnum;

/**
 * Cash-on-delivery payment mode (used inside the `APT000918` service block).
 *
 * - `CON` — default cash on delivery.
 * - `ACM` — direct charge to a sender-provided account (CM_OMEST / CM_CUSTOMER).
 * - `ABM` — bank-managed direct charge (BM_OMEST).
 */
enum PaymentMode: string
{
    use MakesEnum;

    case CashOnDelivery = 'CON';
    case AccountChargeMail = 'ACM';
    case AccountChargeBank = 'ABM';
}

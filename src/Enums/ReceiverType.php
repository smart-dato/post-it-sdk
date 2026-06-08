<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Enums;

use SmartDato\PostIt\Enums\Concerns\MakesEnum;

/**
 * Receiver type for international shipments (`data.international.receiverType`).
 *
 * See section 5.6 of the API manual for how this affects the available
 * carriers and extra services.
 */
enum ReceiverType: string
{
    use MakesEnum;

    case RetailDelivery = 'retailDelivery';

    case BusinessDelivery = 'businessDelivery';
}

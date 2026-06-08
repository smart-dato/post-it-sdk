<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Enums;

use SmartDato\PostIt\Enums\Concerns\MakesEnum;

/**
 * Pickup booking operation, selecting whether a booking is created, deleted
 * or edited (`operation` field of the pickup booking request).
 */
enum PickupOperation: string
{
    use MakesEnum;

    case Add = 'I';

    case Delete = 'A';

    case Edit = 'M';
}

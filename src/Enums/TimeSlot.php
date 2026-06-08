<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Enums;

use SmartDato\PostIt\Enums\Concerns\MakesEnum;

/**
 * Pickup time slot: morning, afternoon, or either.
 */
enum TimeSlot: string
{
    use MakesEnum;

    case Morning = 'AM';

    case Afternoon = 'PM';

    case Anytime = 'AMPM';
}

<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Enums\Concerns;

use ValueError;

/**
 * Adds a lenient string factory to a backed enum.
 *
 * Unlike the native `from()` (which throws on any mismatch) and `tryFrom()`
 * (which only matches the exact backing value), `make()` trims input and
 * matches case-insensitively against both the backing value and the case
 * name, throwing a descriptive {@see ValueError} when nothing matches.
 *
 * @mixin \BackedEnum
 */
trait MakesEnum
{
    public static function make(string|self $value): self
    {
        if ($value instanceof self) {
            return $value;
        }

        $normalized = trim($value);

        $direct = self::tryFrom($normalized);
        if ($direct instanceof self) {
            return $direct;
        }

        foreach (self::cases() as $case) {
            if (strcasecmp($case->value, $normalized) === 0 || strcasecmp($case->name, $normalized) === 0) {
                return $case;
            }
        }

        throw new ValueError(sprintf('"%s" is not a valid %s.', $value, self::class));
    }

    public static function tryMake(string|self|null $value): ?self
    {
        if ($value === null) {
            return null;
        }

        try {
            return self::make($value);
        } catch (ValueError) {
            return null;
        }
    }
}

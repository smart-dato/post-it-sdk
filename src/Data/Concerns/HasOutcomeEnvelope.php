<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data\Concerns;

use SmartDato\PostIt\Exceptions\PostItApiException;

/**
 * Helpers for the pickup/deposit response envelopes, which report success via
 * an `OK`/`KO` `result` string plus optional `errorCode`/`errorDescription`,
 * and wrap lists in an `{ "item": [ ... ] }` object.
 */
trait HasOutcomeEnvelope
{
    /**
     * @throws PostItApiException when the outcome is `KO` or an error code is present.
     */
    protected static function assertOutcomeOk(mixed $result, mixed $errorCode, mixed $errorDescription): void
    {
        $resultString = is_string($result) ? strtoupper(trim($result)) : '';
        $code = is_string($errorCode) ? trim($errorCode) : (string) ($errorCode ?? '');

        $failed = $resultString === 'KO' || ($code !== '' && $code !== '0');

        if (! $failed) {
            return;
        }

        $description = is_string($errorDescription) && $errorDescription !== '' ? $errorDescription : 'Request failed';

        throw new PostItApiException(
            sprintf('Poste Italiane [%s] %s', $code !== '' ? $code : 'KO', $description),
        );
    }

    /**
     * Unwrap an `{ "item": [ ... ] }` list, tolerating a bare array or a single
     * object, and dropping non-array entries.
     *
     * @return array<int, array<string, mixed>>
     */
    protected static function unwrapItems(mixed $value): array
    {
        if (! is_array($value)) {
            return [];
        }

        $items = $value['item'] ?? $value;

        if (! is_array($items)) {
            return [];
        }

        if ($items !== [] && ! array_is_list($items)) {
            $items = [$items];
        }

        return array_values(array_filter($items, 'is_array'));
    }

    protected static function stringOrNull(mixed $value): ?string
    {
        if (! is_string($value) || $value === '') {
            return null;
        }

        return $value;
    }
}

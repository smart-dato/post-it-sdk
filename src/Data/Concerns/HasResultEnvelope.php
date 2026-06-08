<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data\Concerns;

use SmartDato\PostIt\Exceptions\PostItApiException;

/**
 * Shared guard for the `result.errorCode` envelope returned by most
 * Poste Italiane services. A missing or zero `errorCode` is treated as success.
 */
trait HasResultEnvelope
{
    /**
     * @param  array<string, mixed>  $response
     *
     * @throws PostItApiException when the envelope carries a non-zero error code.
     */
    protected static function assertResultOk(array $response): void
    {
        $result = $response['result'] ?? null;

        if (! is_array($result)) {
            return;
        }

        $errorCode = $result['errorCode'] ?? null;

        if ($errorCode === null || $errorCode === 0) {
            return;
        }

        $description = (string) ($result['errorDescription'] ?? 'Unknown error');

        throw new PostItApiException(
            sprintf('Poste Italiane [%s] %s', $errorCode, $description),
        );
    }
}

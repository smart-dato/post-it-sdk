<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

use SmartDato\PostIt\Exceptions\PostItApiException;

/**
 * Successful response from `POST /postalandlogistics/parcel/waybill`.
 *
 * Errors are surfaced via {@see self::fromArray()} as {@see PostItApiException}.
 */
final readonly class WaybillResponseData
{
    /**
     * @param  array<int, array{
     *     code: string,
     *     downloadURL: ?string,
     *     internationalCode: ?string,
     *     internationalCode2: ?string,
     *     downloadUrlImg: ?string
     * }>  $waybills
     */
    public function __construct(
        public string $costCenterCode,
        public string $contractCode,
        public array $waybills,
    ) {}

    /**
     * @param  array<string, mixed>  $response
     *
     * @throws PostItApiException when the response (or any individual waybill) carries a non-zero error code or is missing required fields.
     */
    public static function fromArray(array $response): self
    {
        if (isset($response['result']) && is_array($response['result'])) {
            $errorCode = $response['result']['errorCode'] ?? null;
            if ($errorCode !== null && $errorCode !== 0) {
                $description = (string) ($response['result']['errorDescription'] ?? 'Unknown error');
                throw new PostItApiException(
                    sprintf('Poste Italiane [%s] %s', $errorCode, $description),
                );
            }
        }

        $waybills = [];
        foreach ($response['waybills'] ?? [] as $waybill) {
            if (! is_array($waybill)) {
                continue;
            }

            self::assertWaybillSucceeded($waybill);

            $code = (string) ($waybill['code'] ?? '');
            if ($code === '') {
                throw new PostItApiException(
                    'Poste Italiane response is missing a waybill code.',
                );
            }

            $waybills[] = [
                'code' => $code,
                'downloadURL' => self::stringOrNull($waybill['downloadURL'] ?? null),
                'internationalCode' => self::stringOrNull($waybill['internationalCode'] ?? null),
                'internationalCode2' => self::stringOrNull($waybill['internationalCode2'] ?? null),
                'downloadUrlImg' => self::stringOrNull($waybill['downloadUrlImg'] ?? null),
            ];
        }

        if ($waybills === []) {
            throw new PostItApiException(
                'Poste Italiane response did not contain any waybills.',
            );
        }

        return new self(
            costCenterCode: (string) ($response['costCenterCode'] ?? ''),
            contractCode: (string) ($response['contractCode'] ?? ''),
            waybills: $waybills,
        );
    }

    /**
     * @param  array<string, mixed>  $waybill
     *
     * @throws PostItApiException when the waybill reports a non-zero errorCode.
     */
    private static function assertWaybillSucceeded(array $waybill): void
    {
        $errorCode = $waybill['errorCode'] ?? null;

        if ($errorCode === null || $errorCode === 0) {
            return;
        }

        $description = (string) ($waybill['errorDescription'] ?? 'Unknown error');
        throw new PostItApiException(
            sprintf('Poste Italiane waybill [%s] %s', $errorCode, $description),
        );
    }

    private static function stringOrNull(mixed $value): ?string
    {
        if (! is_string($value) || $value === '') {
            return null;
        }

        return $value;
    }
}

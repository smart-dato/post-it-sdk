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
     * @param  array<int, array{code: string, downloadURL: ?string}>  $waybills
     */
    public function __construct(
        public string $costCenterCode,
        public string $contractCode,
        public array $waybills,
    ) {}

    /**
     * @param  array<string, mixed>  $response
     *
     * @throws PostItApiException when the response contains a non-zero `result.errorCode` or is missing required fields.
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
            $code = (string) ($waybill['code'] ?? '');
            if ($code === '') {
                throw new PostItApiException(
                    'Poste Italiane response is missing a waybill code.',
                );
            }
            $url = (string) ($waybill['downloadURL'] ?? '');
            $waybills[] = ['code' => $code, 'downloadURL' => $url === '' ? null : $url];
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
}

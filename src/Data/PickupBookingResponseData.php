<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

use SmartDato\PostIt\Data\Concerns\HasOutcomeEnvelope;
use SmartDato\PostIt\Exceptions\PostItApiException;

/**
 * Response of `POST /postalandlogistics/parcel/pickup` — the booking outcome
 * and the assigned pickup booking id.
 */
final readonly class PickupBookingResponseData
{
    use HasOutcomeEnvelope;

    public function __construct(
        public string $bookingId,
        public string $result,
        public ?string $errorCode = null,
        public ?string $errorDescription = null,
    ) {}

    /**
     * @param  array<string, mixed>  $response
     *
     * @throws PostItApiException
     */
    public static function fromArray(array $response): self
    {
        $item = self::unwrapItems($response['result'] ?? [])[0] ?? [];

        $result = isset($item['result']) ? (string) $item['result'] : '';
        $errorCode = self::stringOrNull($item['errorCode'] ?? null);
        $errorDescription = self::stringOrNull($item['errorDescription'] ?? null);

        self::assertOutcomeOk($result, $errorCode, $errorDescription);

        return new self(
            bookingId: (string) ($response['bookingId'] ?? ''),
            result: $result,
            errorCode: $errorCode,
            errorDescription: $errorDescription,
        );
    }
}

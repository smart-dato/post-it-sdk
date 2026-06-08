<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

use SmartDato\PostIt\Data\Concerns\HasOutcomeEnvelope;
use SmartDato\PostIt\Exceptions\PostItApiException;

/**
 * Response of `POST /postalandlogistics/parcel/pickupReport` — the bookings
 * matching the filter plus the catalogue of possible pickup statuses.
 */
final readonly class PickupReportResponseData
{
    use HasOutcomeEnvelope;

    /**
     * @param  array<PickupReportItemData>  $pickups
     * @param  array<int, array{status: ?string, description: ?string}>  $statuses
     */
    public function __construct(
        public string $result,
        public array $pickups,
        public array $statuses,
    ) {}

    /**
     * @param  array<string, mixed>  $response
     *
     * @throws PostItApiException
     */
    public static function fromArray(array $response): self
    {
        self::assertOutcomeOk($response['result'] ?? null, $response['errorCode'] ?? null, $response['errorDescription'] ?? null);

        $pickups = [];
        foreach (self::unwrapItems($response['pickup'] ?? []) as $item) {
            $pickups[] = PickupReportItemData::fromArray($item);
        }

        $statuses = [];
        foreach (self::unwrapItems($response['statusList'] ?? []) as $status) {
            $statuses[] = [
                'status' => self::stringOrNull($status['status'] ?? null),
                'description' => self::stringOrNull($status['statusDescription'] ?? $status['description'] ?? null),
            ];
        }

        return new self(
            result: isset($response['result']) ? (string) $response['result'] : '',
            pickups: $pickups,
            statuses: $statuses,
        );
    }
}

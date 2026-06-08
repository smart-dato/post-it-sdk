<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

use SmartDato\PostIt\Data\Concerns\HasOutcomeEnvelope;
use SmartDato\PostIt\Exceptions\PostItApiException;

/**
 * Response of `POST /postalandlogistics/parcel/depositsList` — the deposited
 * shipments matching the filter, plus the catalogues of deposit reasons and
 * statuses.
 */
final readonly class DepositsListResponseData
{
    use HasOutcomeEnvelope;

    /**
     * @param  array<DepositData>  $deposits
     * @param  array<int, array{status: ?string, description: ?string}>  $reasons
     * @param  array<int, array{status: ?string, description: ?string}>  $statuses
     */
    public function __construct(
        public string $result,
        public array $deposits,
        public array $reasons,
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

        $deposits = [];
        foreach (self::unwrapItems($response['deposits'] ?? []) as $item) {
            $deposits[] = DepositData::fromArray($item);
        }

        return new self(
            result: isset($response['result']) ? (string) $response['result'] : '',
            deposits: $deposits,
            reasons: self::statusDescriptions($response['reasons'] ?? []),
            statuses: self::statusDescriptions($response['statusList'] ?? []),
        );
    }

    /**
     * @return array<int, array{status: ?string, description: ?string}>
     */
    private static function statusDescriptions(mixed $value): array
    {
        $entries = [];
        foreach (self::unwrapItems($value) as $entry) {
            $entries[] = [
                'status' => self::stringOrNull($entry['status'] ?? null),
                'description' => self::stringOrNull($entry['description'] ?? $entry['reasonDescription'] ?? null),
            ];
        }

        return $entries;
    }
}

<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

use SmartDato\PostIt\Data\Concerns\HasResultEnvelope;
use SmartDato\PostIt\Exceptions\PostItApiException;

/**
 * Response of `GET /postalandlogistics/parcel/international/taric` — the full
 * TARIC list (code + Italian/English description) for extra-EU standard products.
 */
final readonly class TaricResponseData
{
    use HasResultEnvelope;

    /**
     * @param  array<TaricData>  $taric
     */
    public function __construct(
        public string $channel,
        public string $contractCode,
        public array $taric,
    ) {}

    /**
     * @param  array<string, mixed>  $response
     *
     * @throws PostItApiException
     */
    public static function fromArray(array $response): self
    {
        self::assertResultOk($response);

        $taric = [];
        foreach ($response['taric'] ?? [] as $row) {
            if (is_array($row)) {
                $taric[] = TaricData::fromArray($row);
            }
        }

        return new self(
            channel: (string) ($response['channel'] ?? ''),
            contractCode: (string) ($response['contractCode'] ?? ''),
            taric: $taric,
        );
    }
}

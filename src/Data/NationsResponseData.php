<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

use SmartDato\PostIt\Data\Concerns\HasResultEnvelope;
use SmartDato\PostIt\Exceptions\PostItApiException;

/**
 * Response of `GET /postalandlogistics/parcel/international/nations` — the list
 * of countries managed for international products, with their ISO codes,
 * EU/extra-EU flag, states and allowed product codes.
 */
final readonly class NationsResponseData
{
    use HasResultEnvelope;

    /**
     * @param  array<NationData>  $nations
     */
    public function __construct(
        public string $channel,
        public string $contractCode,
        public array $nations,
    ) {}

    /**
     * @param  array<string, mixed>  $response
     *
     * @throws PostItApiException
     */
    public static function fromArray(array $response): self
    {
        self::assertResultOk($response);

        $nations = [];
        foreach ($response['countries'] ?? [] as $country) {
            if (is_array($country)) {
                $nations[] = NationData::fromArray($country);
            }
        }

        return new self(
            channel: (string) ($response['channel'] ?? ''),
            contractCode: (string) ($response['contractCode'] ?? ''),
            nations: $nations,
        );
    }
}

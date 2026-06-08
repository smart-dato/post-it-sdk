<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

use SmartDato\PostIt\Data\Concerns\HasResultEnvelope;
use SmartDato\PostIt\Exceptions\PostItApiException;

/**
 * Response of `POST /postalandlogistics/parcel/international/nation/details` —
 * the detailed country data sheet for a given ISO4 country and product.
 *
 * Carriers are keyed by name; the customs/general notes per APTUS product code
 * arrive as sibling top-level keys (e.g. `APT000904`) and are collected into
 * {@see self::$customsByProduct}.
 */
final readonly class NationDetailsResponseData
{
    use HasResultEnvelope;

    /**
     * @param  array<string, CarrierDetailData>  $carriers  keyed by carrier name
     * @param  array<string, array{customsInfo: ?string, generalInfo: ?string}>  $customsByProduct  keyed by APTUS product code
     */
    public function __construct(
        public string $channel,
        public string $contractCode,
        public string $countryCode,
        public array $carriers,
        public array $customsByProduct,
    ) {}

    /**
     * @param  array<string, mixed>  $response
     *
     * @throws PostItApiException
     */
    public static function fromArray(array $response): self
    {
        self::assertResultOk($response);

        $carriers = [];
        if (isset($response['carriers']) && is_array($response['carriers'])) {
            foreach ($response['carriers'] as $name => $data) {
                if (is_array($data)) {
                    $carriers[(string) $name] = CarrierDetailData::fromArray((string) $name, $data);
                }
            }
        }

        $customsByProduct = [];
        foreach ($response as $key => $value) {
            if (! is_string($key) || preg_match('/^APT\d+$/', $key) !== 1 || ! is_array($value)) {
                continue;
            }

            $customsByProduct[$key] = [
                'customsInfo' => self::stringOrNull($value['customs_info'] ?? null),
                'generalInfo' => self::stringOrNull($value['general_info'] ?? null),
            ];
        }

        return new self(
            channel: (string) ($response['channel'] ?? ''),
            contractCode: (string) ($response['contractCode'] ?? ''),
            countryCode: (string) ($response['countryCode'] ?? ''),
            carriers: $carriers,
            customsByProduct: $customsByProduct,
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

<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

use SmartDato\PostIt\Exceptions\PostItApiException;

/**
 * Response of `POST /postalandlogistics/parcel/waybill/services` — the extra
 * services available for the shipment, the per-service parameter map, the
 * compatibility matrix and any COD / full-coverage constraints. `carrier` and
 * `itemsNumber` are populated for international shipments only.
 *
 * Note: this endpoint reports its outcome via `result.codeError` /
 * `result.codeDescription` (not the `errorCode` envelope used elsewhere).
 */
final readonly class ServicesResponseData
{
    /**
     * @param  array<int, string>  $services
     * @param  array<string, array<string, mixed>>  $serviceMap  per-service parameters, keyed by service code
     * @param  array<string, array<int, string>>  $compatibilities  compatible service codes, keyed by service code
     * @param  array<string, mixed>  $constraints  raw COD / full-coverage constraint data
     */
    public function __construct(
        public string $channel,
        public string $contractCode,
        public string $costCenterCode,
        public string $product,
        public array $services,
        public array $serviceMap,
        public array $compatibilities,
        public array $constraints,
        public ?string $carrier = null,
        public ?int $itemsNumber = null,
    ) {}

    /**
     * @param  array<string, mixed>  $response
     *
     * @throws PostItApiException
     */
    public static function fromArray(array $response): self
    {
        self::assertResultOk($response);

        $services = [];
        foreach ($response['services'] ?? [] as $service) {
            if (is_string($service) && $service !== '') {
                $services[] = $service;
            }
        }

        $compatibilities = [];
        if (isset($response['compatibilities']) && is_array($response['compatibilities'])) {
            foreach ($response['compatibilities'] as $code => $compatible) {
                if (! is_array($compatible)) {
                    continue;
                }
                $compatibilities[(string) $code] = array_values(array_filter($compatible, 'is_string'));
            }
        }

        $itemsNumber = $response['Items_number'] ?? $response['items_number'] ?? null;

        return new self(
            channel: (string) ($response['channel'] ?? ''),
            contractCode: (string) ($response['contractCode'] ?? ''),
            costCenterCode: (string) ($response['costCenterCode'] ?? ''),
            product: (string) ($response['product'] ?? ''),
            services: $services,
            serviceMap: self::arrayMap($response['serviceMap'] ?? null),
            compatibilities: $compatibilities,
            constraints: self::arrayMap($response['constraints'] ?? null),
            carrier: is_string($response['carrier'] ?? null) && $response['carrier'] !== '' ? $response['carrier'] : null,
            itemsNumber: is_numeric($itemsNumber) ? (int) $itemsNumber : null,
        );
    }

    /**
     * @param  array<string, mixed>  $response
     *
     * @throws PostItApiException
     */
    private static function assertResultOk(array $response): void
    {
        $result = $response['result'] ?? null;

        if (! is_array($result)) {
            return;
        }

        $codeError = $result['codeError'] ?? null;

        if ($codeError === null || $codeError === 0) {
            return;
        }

        $description = (string) ($result['codeDescription'] ?? 'Unknown error');

        throw new PostItApiException(sprintf('Poste Italiane [%s] %s', $codeError, $description));
    }

    /**
     * @return array<string, mixed>
     */
    private static function arrayMap(mixed $value): array
    {
        if (! is_array($value)) {
            return [];
        }

        /** @var array<string, mixed> $value */
        return $value;
    }
}

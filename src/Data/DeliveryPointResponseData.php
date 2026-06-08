<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

use SmartDato\PostIt\Exceptions\PostItApiException;

/**
 * Response of the delivery point master data service. Poste Italiane wraps the
 * payload in a `return` envelope carrying an `outcome`/`code` result and a
 * `deliveryPoint[]` list.
 */
final readonly class DeliveryPointResponseData
{
    /**
     * @param  array<DeliveryPointData>  $deliveryPoints
     */
    public function __construct(
        public string $outcome,
        public array $deliveryPoints,
    ) {}

    /**
     * @param  array<string, mixed>  $response
     *
     * @throws PostItApiException
     */
    public static function fromArray(array $response): self
    {
        $envelope = isset($response['return']) && is_array($response['return'])
            ? $response['return']
            : $response;

        self::assertSuccessful($envelope);

        $deliveryPoints = [];
        foreach ($envelope['deliveryPoint'] ?? [] as $point) {
            if (is_array($point)) {
                $deliveryPoints[] = DeliveryPointData::fromArray($point);
            }
        }

        return new self(
            outcome: isset($envelope['outcome']) ? (string) $envelope['outcome'] : '',
            deliveryPoints: $deliveryPoints,
        );
    }

    /**
     * @param  array<string, mixed>  $envelope
     *
     * @throws PostItApiException
     */
    private static function assertSuccessful(array $envelope): void
    {
        $code = $envelope['code'] ?? null;
        $outcome = $envelope['outcome'] ?? null;

        $failedByCode = $code !== null && (int) $code !== 0;
        $failedByOutcome = is_string($outcome) && strtoupper($outcome) === 'KO';

        if (! $failedByCode && ! $failedByOutcome) {
            return;
        }

        throw new PostItApiException(sprintf('Poste Italiane delivery point [%s] request failed', $code ?? 'KO'));
    }
}

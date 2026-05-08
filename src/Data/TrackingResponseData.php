<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

use DateTimeImmutable;
use SmartDato\PostIt\Exceptions\PostItApiException;
use Throwable;

/**
 * Parsed response of `POST /postalandlogistics/parcel/tracking`.
 *
 * Poste Italiane returns a deeply nested envelope keyed by `result` /
 * `shipments` / `tracingHistory`; this DTO flattens the per-shipment events
 * into {@see TrackingEventData}, while preserving the original waybill number.
 */
final readonly class TrackingResponseData
{
    /**
     * @param  array<TrackingEventData>  $events
     */
    public function __construct(
        public string $waybillNumber,
        public array $events,
    ) {}

    /**
     * @param  array<string, mixed>  $response
     *
     * @throws PostItApiException
     */
    public static function fromArray(array $response): self
    {
        if (isset($response['result']) && is_array($response['result'])) {
            $errorCode = $response['result']['errorCode'] ?? null;
            if ($errorCode !== null && $errorCode !== 0) {
                $description = (string) ($response['result']['errorDescription'] ?? 'Unknown error');
                throw new PostItApiException(
                    sprintf('Poste Italiane tracking [%s] %s', $errorCode, $description),
                );
            }
        }

        $shipment = $response['shipments'][0] ?? $response['shipmentsData'][0] ?? null;

        if (! is_array($shipment)) {
            throw new PostItApiException(
                'Poste Italiane tracking response is missing shipment data.',
            );
        }

        $waybill = (string) ($shipment['waybillNumber'] ?? '');
        $events = [];
        foreach ($shipment['tracingHistory'] ?? $shipment['tracingStates'] ?? [] as $event) {
            if (! is_array($event)) {
                continue;
            }
            $events[] = new TrackingEventData(
                statusCode: isset($event['statusCode']) ? (string) $event['statusCode'] : null,
                statusDescription: isset($event['statusDescription']) ? (string) $event['statusDescription'] : null,
                location: isset($event['location']) ? (string) $event['location'] : null,
                occurredAt: self::parseDate($event['date'] ?? $event['statusDate'] ?? null),
            );
        }

        return new self(waybillNumber: $waybill, events: $events);
    }

    private static function parseDate(mixed $value): ?DateTimeImmutable
    {
        if (! is_string($value) || $value === '') {
            return null;
        }

        try {
            return new DateTimeImmutable($value);
        } catch (Throwable) {
            return null;
        }
    }
}

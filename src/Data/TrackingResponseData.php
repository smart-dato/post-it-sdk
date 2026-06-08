<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

use DateTimeImmutable;
use SmartDato\PostIt\Exceptions\PostItApiException;
use Throwable;

/**
 * Parsed response of `POST /postalandlogistics/parcel/tracking`.
 *
 * Poste Italiane wraps the payload in a `return` envelope carrying an
 * `outcome`/`code` result and a `shipment[]` list, each holding a `tracking[]`
 * history. This DTO unwraps the envelope and flattens the events of the first
 * shipment into {@see TrackingEventData}, preserving the waybill number.
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
        $envelope = isset($response['return']) && is_array($response['return'])
            ? $response['return']
            : $response;

        self::assertSuccessful($envelope);

        $shipment = $envelope['shipment'][0] ?? null;

        if (! is_array($shipment)) {
            throw new PostItApiException(
                'Poste Italiane tracking response is missing shipment data.',
            );
        }

        $waybill = (string) ($shipment['waybillNumber'] ?? '');
        $events = [];
        foreach ($shipment['tracking'] ?? [] as $event) {
            if (! is_array($event)) {
                continue;
            }
            $events[] = new TrackingEventData(
                statusCode: isset($event['status']) ? (string) $event['status'] : null,
                statusDescription: isset($event['StatusDescription']) ? (string) $event['StatusDescription'] : null,
                location: isset($event['officeDescription']) ? (string) $event['officeDescription'] : null,
                occurredAt: self::parseDate($event['data'] ?? null),
                phase: isset($event['phase']) ? (string) $event['phase'] : null,
                synthesisStatusDescription: isset($event['synthesisStatusDescription']) ? (string) $event['synthesisStatusDescription'] : null,
            );
        }

        return new self(waybillNumber: $waybill, events: $events);
    }

    /**
     * @param  array<string, mixed>  $envelope
     *
     * @throws PostItApiException when the envelope reports a non-OK outcome.
     */
    private static function assertSuccessful(array $envelope): void
    {
        $code = $envelope['code'] ?? null;
        $outcome = $envelope['outcome'] ?? $envelope['result'] ?? null;

        $failedByCode = $code !== null && (int) $code !== 0;
        $failedByOutcome = is_string($outcome) && strtoupper($outcome) === 'KO';

        if (! $failedByCode && ! $failedByOutcome) {
            return;
        }

        throw new PostItApiException(sprintf(
            'Poste Italiane tracking [%s] %s',
            $code ?? 'KO',
            self::extractErrorMessage($envelope),
        ));
    }

    /**
     * @param  array<string, mixed>  $envelope
     */
    private static function extractErrorMessage(array $envelope): string
    {
        $source = $envelope['messages'] ?? [];

        if (! is_array($source)) {
            return 'Tracking request failed';
        }

        $messages = [];
        array_walk_recursive($source, function (mixed $value) use (&$messages): void {
            if (is_string($value) && $value !== '') {
                $messages[] = $value;
            }
        });

        return $messages === [] ? 'Tracking request failed' : implode('; ', $messages);
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

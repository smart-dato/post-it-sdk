<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

/**
 * Response of `POST /postalandlogistics/parcel/transitTime`.
 *
 * The request envelope is a `body[]` batch; this DTO flattens the first body
 * element's `result.transittimes` and surfaces any error texts from its
 * `errors.details[]`.
 */
final readonly class TransitTimeResponseData
{
    /**
     * @param  array<TransitTimeData>  $transitTimes
     * @param  array<int, string>  $errors
     */
    public function __construct(
        public array $transitTimes,
        public array $errors,
    ) {}

    /**
     * @param  array<string, mixed>  $response
     */
    public static function fromArray(array $response): self
    {
        $body = $response['body'][0] ?? null;

        if (! is_array($body)) {
            return new self([], []);
        }

        $transitTimes = [];
        $rows = $body['result']['transittimes'] ?? [];
        if (is_array($rows)) {
            foreach ($rows as $row) {
                if (is_array($row)) {
                    $transitTimes[] = TransitTimeData::fromArray($row);
                }
            }
        }

        $errors = [];
        $details = $body['errors']['details'] ?? [];
        if (is_array($details)) {
            foreach ($details as $detail) {
                if (! is_array($detail)) {
                    continue;
                }
                $text = $detail['cleartext'] ?? $detail['codedtext'] ?? null;
                if (is_string($text) && $text !== '') {
                    $errors[] = $text;
                }
            }
        }

        return new self($transitTimes, $errors);
    }
}

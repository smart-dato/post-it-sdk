<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

use SmartDato\PostIt\Data\Concerns\HasOutcomeEnvelope;
use SmartDato\PostIt\Exceptions\PostItApiException;

/**
 * Response of `POST /postalandlogistics/parcel/digipodDownload` — the digital
 * proof-of-delivery document as a base64 string.
 */
final readonly class DigipodDownloadResponseData
{
    use HasOutcomeEnvelope;

    public function __construct(
        public string $result,
        public ?string $filename,
        public ?string $attachedBase64,
    ) {}

    /**
     * @param  array<string, mixed>  $response
     *
     * @throws PostItApiException
     */
    public static function fromArray(array $response): self
    {
        self::assertOutcomeOk($response['result'] ?? null, $response['errorCode'] ?? null, $response['errorDescription'] ?? null);

        return new self(
            result: isset($response['result']) ? (string) $response['result'] : '',
            filename: self::stringOrNull($response['filename'] ?? null),
            attachedBase64: self::stringOrNull($response['attached'] ?? null),
        );
    }

    /**
     * Decoded document bytes, or null when the response carried no attachment.
     */
    public function contents(): ?string
    {
        if ($this->attachedBase64 === null) {
            return null;
        }

        $decoded = base64_decode($this->attachedBase64, true);

        return $decoded === false ? null : $decoded;
    }
}

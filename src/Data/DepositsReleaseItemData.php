<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

/**
 * Per-barcode outcome of a deposits release request (`result.item[]`).
 */
final readonly class DepositsReleaseItemData
{
    public function __construct(
        public string $barcode,
        public string $result,
        public ?string $errorCode = null,
        public ?string $errorDescription = null,
    ) {}

    public function succeeded(): bool
    {
        return strtoupper(trim($this->result)) === 'OK';
    }

    /**
     * @param  array<string, mixed>  $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            barcode: (string) ($data['barcode'] ?? ''),
            result: isset($data['result']) ? (string) $data['result'] : '',
            errorCode: self::stringOrNull($data['errorCode'] ?? null),
            errorDescription: self::stringOrNull($data['errorDescription'] ?? null),
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

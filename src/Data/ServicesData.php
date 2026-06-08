<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

use SmartDato\PostIt\Enums\PaymentMode;

/**
 * Optional service block on a waybill.
 *
 * Poste Italiane accepts a free-form JSON object keyed by service code (e.g.
 * `APT000901` for multicollo, `APT000918` for COD). This DTO covers the two
 * most common cases; pass arbitrary extra service blocks via
 * {@see self::extra} when integrating less common products.
 */
final readonly class ServicesData
{
    /**
     * @param  array<string, array<string, mixed>>  $extra  Additional raw service blocks keyed by service code.
     */
    public function __construct(
        public ?string $multicolloCode = null,
        public ?float $codAmount = null,
        public ?PaymentMode $codPaymentMode = null,
        public array $extra = [],
    ) {}

    /**
     * @return array<string, array<string, mixed>>
     */
    public function toArray(): array
    {
        $payload = $this->extra;

        if (is_string($this->multicolloCode) && $this->multicolloCode !== '') {
            $payload[$this->multicolloCode] = [];
        }

        if ($this->codAmount !== null && $this->codPaymentMode instanceof PaymentMode) {
            $payload['APT000918'] = [
                'amount' => number_format($this->codAmount, 2, '.', ''),
                'paymentMode' => $this->codPaymentMode->value,
            ];
        }

        return $payload;
    }
}

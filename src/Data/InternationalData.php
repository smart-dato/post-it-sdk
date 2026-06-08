<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Data;

use SmartDato\PostIt\Enums\ReceiverType;

/**
 * The `data.international` block, present only for international products
 * (APT000903 / APT000904 / APT001013).
 *
 * `carrier` is assigned automatically by Poste Italiane and is never sent.
 * `waybillTotalValue` is a free-form string per the manual; format it in the
 * shipment currency before constructing.
 */
final readonly class InternationalData
{
    public function __construct(
        public ReceiverType|string $receiverType,
        public ?string $currency = null,
        public ?string $waybillTotalValue = null,
        public ?string $contentCode = null,
        public ?string $note = null,
    ) {}

    /**
     * @return array<string, string>
     */
    public function toArray(): array
    {
        $data = [
            'receiverType' => $this->receiverType instanceof ReceiverType
                ? $this->receiverType->value
                : $this->receiverType,
        ];

        if ($this->currency !== null) {
            $data['currency'] = $this->currency;
        }

        if ($this->waybillTotalValue !== null) {
            $data['waybillTotalValue'] = $this->waybillTotalValue;
        }

        if ($this->contentCode !== null) {
            $data['contentCode'] = $this->contentCode;
        }

        if ($this->note !== null) {
            $data['note'] = $this->note;
        }

        return $data;
    }
}

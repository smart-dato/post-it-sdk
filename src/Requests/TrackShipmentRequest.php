<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Requests;

use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use SmartDato\PostIt\Data\TrackingResponseData;

/**
 * `POST /postalandlogistics/parcel/tracking`.
 *
 * The request envelope is fixed to `arg0.shipmentsData[].waybillNumber`; the
 * remaining fields (`statusDescription = 'E'`, `customerType = 'DQ'`) are
 * constants documented by Poste Italiane and unlikely to vary, so they are
 * baked in. `lastTracingState` accepts only `{Y, N}`: `N` returns the full
 * history, `Y` only the latest state.
 */
final class TrackShipmentRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly string $waybillNumber,
        private readonly bool $fullHistory = true,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/postalandlogistics/parcel/tracking';
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): TrackingResponseData
    {
        /** @var array<string, mixed> $payload */
        $payload = $response->json();

        return TrackingResponseData::fromArray($payload);
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    protected function defaultBody(): array
    {
        return [
            'arg0' => [
                'shipmentsData' => [
                    [
                        'waybillNumber' => $this->waybillNumber,
                        'lastTracingState' => $this->fullHistory ? 'N' : 'Y',
                    ],
                ],
                'statusDescription' => 'E',
                'customerType' => 'DQ',
            ],
        ];
    }
}

<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Requests;

use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use SmartDato\PostIt\Data\PickupReportFilterData;
use SmartDato\PostIt\Data\PickupReportResponseData;

/**
 * `POST /postalandlogistics/parcel/pickupReport` — list pickups matching the
 * given filter (wrapped in `pickupFilter`).
 */
final class GetPickupReportRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly PickupReportFilterData $filter,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/postalandlogistics/parcel/pickupReport';
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): PickupReportResponseData
    {
        /** @var array<string, mixed> $payload */
        $payload = $response->json();

        return PickupReportResponseData::fromArray($payload);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultBody(): array
    {
        return [
            'pickupFilter' => $this->filter->toArray(),
        ];
    }
}

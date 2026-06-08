<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Requests;

use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use SmartDato\PostIt\Data\ServicesQueryData;
use SmartDato\PostIt\Data\ServicesResponseData;

/**
 * `POST /postalandlogistics/parcel/waybill/services` — extract the extra
 * services, compatibility matrix and (for international) the assigned carrier
 * for a shipment.
 */
final class GetServicesRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly ServicesQueryData $queryData,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/postalandlogistics/parcel/waybill/services';
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): ServicesResponseData
    {
        /** @var array<string, mixed> $payload */
        $payload = $response->json();

        return ServicesResponseData::fromArray($payload);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultBody(): array
    {
        return $this->queryData->toArray();
    }
}

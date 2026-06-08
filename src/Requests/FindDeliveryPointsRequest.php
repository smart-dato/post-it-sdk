<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Requests;

use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use SmartDato\PostIt\Data\DeliveryPointResponseData;
use SmartDato\PostIt\Enums\DeliveryPointServiceType;

/**
 * `POST /postalandlogistics/parcel/deliveryPoint` — delivery point master data
 * for a postal code and service type.
 */
final class FindDeliveryPointsRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly string $zipCode,
        private readonly DeliveryPointServiceType|string $serviceType,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/postalandlogistics/parcel/deliveryPoint';
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): DeliveryPointResponseData
    {
        /** @var array<string, mixed> $payload */
        $payload = $response->json();

        return DeliveryPointResponseData::fromArray($payload);
    }

    /**
     * @return array<string, array<string, string>>
     */
    protected function defaultBody(): array
    {
        return [
            'arg0' => [
                'zipCode' => $this->zipCode,
                'serviceType' => $this->serviceType instanceof DeliveryPointServiceType ? $this->serviceType->value : $this->serviceType,
            ],
        ];
    }
}

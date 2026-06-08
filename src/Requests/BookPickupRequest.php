<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Requests;

use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use SmartDato\PostIt\Data\PickupBookingData;
use SmartDato\PostIt\Data\PickupBookingResponseData;

/**
 * `POST /postalandlogistics/parcel/pickup` — create, edit or delete a pickup
 * booking. The booking item is wrapped in the `{ "pickup": { "item": [...] } }`
 * envelope.
 */
final class BookPickupRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly PickupBookingData $data,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/postalandlogistics/parcel/pickup';
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): PickupBookingResponseData
    {
        /** @var array<string, mixed> $payload */
        $payload = $response->json();

        return PickupBookingResponseData::fromArray($payload);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultBody(): array
    {
        return [
            'pickup' => [
                'item' => [$this->data->toArray()],
            ],
        ];
    }
}

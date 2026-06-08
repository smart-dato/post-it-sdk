<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Requests;

use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use SmartDato\PostIt\Data\NationsResponseData;

/**
 * `GET /postalandlogistics/parcel/international/nations` — the list of countries
 * managed for international products. The request carries no body.
 */
final class ListNationsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/postalandlogistics/parcel/international/nations';
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): NationsResponseData
    {
        /** @var array<string, mixed> $payload */
        $payload = $response->json();

        return NationsResponseData::fromArray($payload);
    }
}

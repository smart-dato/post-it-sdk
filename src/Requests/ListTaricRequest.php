<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Requests;

use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use SmartDato\PostIt\Data\TaricResponseData;

/**
 * `GET /postalandlogistics/parcel/international/taric` — the TARIC list for
 * extra-EU standard products. The request carries no body.
 */
final class ListTaricRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/postalandlogistics/parcel/international/taric';
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): TaricResponseData
    {
        /** @var array<string, mixed> $payload */
        $payload = $response->json();

        return TaricResponseData::fromArray($payload);
    }
}

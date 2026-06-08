<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Requests;

use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use SmartDato\PostIt\Data\LocationFinderQueryData;
use SmartDato\PostIt\Data\LocationFinderResponseData;

/**
 * `GET /postalandlogistics/parcel/locationFinder` — international PUDO points
 * (PDB International Plus only). The filters are passed as query parameters.
 */
final class FindInternationalPudosRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        private readonly LocationFinderQueryData $queryData,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/postalandlogistics/parcel/locationFinder';
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): LocationFinderResponseData
    {
        /** @var array<string, mixed> $payload */
        $payload = $response->json();

        return LocationFinderResponseData::fromArray($payload);
    }

    /**
     * @return array<string, scalar|array<int, string>>
     */
    protected function defaultQuery(): array
    {
        return $this->queryData->toArray();
    }
}

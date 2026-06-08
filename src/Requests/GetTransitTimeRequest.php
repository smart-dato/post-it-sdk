<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Requests;

use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use SmartDato\PostIt\Data\TransitTimeQueryData;
use SmartDato\PostIt\Data\TransitTimeResponseData;

/**
 * `POST /postalandlogistics/parcel/transitTime` — estimate transit time for a
 * product between two postal codes. The query is wrapped in the `body[]` batch
 * envelope.
 */
final class GetTransitTimeRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly TransitTimeQueryData $queryData,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/postalandlogistics/parcel/transitTime';
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): TransitTimeResponseData
    {
        /** @var array<string, mixed> $payload */
        $payload = $response->json();

        return TransitTimeResponseData::fromArray($payload);
    }

    /**
     * @return array<string, array<int, array<string, mixed>>>
     */
    protected function defaultBody(): array
    {
        return [
            'body' => [$this->queryData->toArray()],
        ];
    }
}

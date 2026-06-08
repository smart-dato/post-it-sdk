<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Requests;

use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use SmartDato\PostIt\Data\DepositsListFilterData;
use SmartDato\PostIt\Data\DepositsListResponseData;

/**
 * `POST /postalandlogistics/parcel/depositsList` — list deposited shipments
 * matching the given filter.
 */
final class ListDepositsRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly DepositsListFilterData $filter,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/postalandlogistics/parcel/depositsList';
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): DepositsListResponseData
    {
        /** @var array<string, mixed> $payload */
        $payload = $response->json();

        return DepositsListResponseData::fromArray($payload);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultBody(): array
    {
        return $this->filter->toArray();
    }
}

<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Requests;

use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use SmartDato\PostIt\Data\GreenIndexFilterData;
use SmartDato\PostIt\Data\GreenIndexResponseData;

/**
 * `POST /postalandlogistics/parcel/gibp/dashboardGreenMeter` — the Green Index
 * emissions dashboard for the given filter.
 */
final class GetGreenIndexRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly GreenIndexFilterData $filter,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/postalandlogistics/parcel/gibp/dashboardGreenMeter';
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): GreenIndexResponseData
    {
        /** @var array<string, mixed> $payload */
        $payload = $response->json();

        return GreenIndexResponseData::fromArray($payload);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultBody(): array
    {
        return $this->filter->toArray();
    }
}

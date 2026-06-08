<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Requests;

use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use SmartDato\PostIt\Data\NationDetailsResponseData;

/**
 * `POST /postalandlogistics/parcel/international/nation/details` — the detailed
 * country data sheet for a given ISO4 country code and APTUS product code.
 */
final class GetNationDetailsRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly string $countryCode,
        private readonly string $productCode,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/postalandlogistics/parcel/international/nation/details';
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): NationDetailsResponseData
    {
        /** @var array<string, mixed> $payload */
        $payload = $response->json();

        return NationDetailsResponseData::fromArray($payload);
    }

    /**
     * @return array<string, string>
     */
    protected function defaultBody(): array
    {
        return [
            'countryCode' => $this->countryCode,
            'productCode' => $this->productCode,
        ];
    }
}

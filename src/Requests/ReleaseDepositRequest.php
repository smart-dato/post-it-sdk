<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Requests;

use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use SmartDato\PostIt\Data\DepositsReleaseData;
use SmartDato\PostIt\Data\DepositsReleaseResponseData;

/**
 * `POST /postalandlogistics/parcel/depositsRelease` — request a release action
 * for one or more deposited waybills.
 */
final class ReleaseDepositRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly DepositsReleaseData $data,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/postalandlogistics/parcel/depositsRelease';
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): DepositsReleaseResponseData
    {
        /** @var array<string, mixed> $payload */
        $payload = $response->json();

        return DepositsReleaseResponseData::fromArray($payload);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultBody(): array
    {
        return $this->data->toArray();
    }
}

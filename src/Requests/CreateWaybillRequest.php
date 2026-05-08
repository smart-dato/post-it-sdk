<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Requests;

use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use SmartDato\PostIt\Data\WaybillRequestData;
use SmartDato\PostIt\Data\WaybillResponseData;

/**
 * `POST /postalandlogistics/parcel/waybill` — create one or more waybills.
 *
 * On success the response carries an array of `waybills[].code` (waybill
 * numbers) and `waybills[].downloadURL` (PDF label URL).
 */
final class CreateWaybillRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly WaybillRequestData $data,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/postalandlogistics/parcel/waybill';
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): WaybillResponseData
    {
        /** @var array<string, mixed> $payload */
        $payload = $response->json();

        return WaybillResponseData::fromArray($payload);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultBody(): array
    {
        return $this->data->toArray();
    }
}

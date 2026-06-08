<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Requests;

use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use SmartDato\PostIt\Data\DigipodDownloadResponseData;

/**
 * `POST /postalandlogistics/parcel/digipodDownload` — download the digital
 * proof-of-delivery document for a waybill.
 */
final class DownloadDigipodRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        private readonly string $barcode,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/postalandlogistics/parcel/digipodDownload';
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): DigipodDownloadResponseData
    {
        /** @var array<string, mixed> $payload */
        $payload = $response->json();

        return DigipodDownloadResponseData::fromArray($payload);
    }

    /**
     * @return array<string, string>
     */
    protected function defaultBody(): array
    {
        return ['barcode' => $this->barcode];
    }
}

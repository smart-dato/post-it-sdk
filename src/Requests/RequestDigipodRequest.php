<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Requests;

use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use SmartDato\PostIt\Data\DigipodRequestResponseData;

/**
 * `POST /postalandlogistics/parcel/digipodRequest` — request a digital proof of
 * delivery for one or more waybills, optionally notified to an email address.
 */
final class RequestDigipodRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param  array<int, string>  $barcodes
     */
    public function __construct(
        private readonly array $barcodes,
        private readonly ?string $mail = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/postalandlogistics/parcel/digipodRequest';
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): DigipodRequestResponseData
    {
        /** @var array<string, mixed> $payload */
        $payload = $response->json();

        return DigipodRequestResponseData::fromArray($payload);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultBody(): array
    {
        return [
            'mail' => $this->mail ?? '',
            'barcode' => [
                'item' => array_map(static fn (string $barcode): array => ['barcode' => $barcode], $this->barcodes),
            ],
        ];
    }
}

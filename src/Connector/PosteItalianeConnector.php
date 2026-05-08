<?php

declare(strict_types=1);

namespace SmartDato\PostIt\Connector;

use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;
use SmartDato\PostIt\Auth\SessionAuthenticator;

/**
 * Saloon connector for the Poste Italiane shipping API.
 *
 * Carries the contract-level base URL and the mandatory `POSTE_clientID`
 * header on every outbound request. Authentication is layered on top via
 * {@see SessionAuthenticator}.
 */
final class PosteItalianeConnector extends Connector
{
    use AcceptsJson;

    public function __construct(
        private readonly string $baseUrl,
        private readonly string $clientId,
    ) {}

    public function resolveBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function clientId(): string
    {
        return $this->clientId;
    }

    /**
     * Default headers applied to every request issued by this connector.
     *
     * The `POSTE_clientID` header is required on every Poste Italiane endpoint
     * (auth and business calls alike).
     *
     * @return array<string, string>
     */
    protected function defaultHeaders(): array
    {
        return [
            'POSTE_clientID' => $this->clientId,
        ];
    }
}

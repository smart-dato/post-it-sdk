<?php

declare(strict_types=1);

namespace SmartDato\PostIt;

use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Request;
use Saloon\Http\Response;
use SmartDato\PostIt\Auth\SessionAuthenticator;
use SmartDato\PostIt\Connector\PosteItalianeConnector;
use SmartDato\PostIt\Data\TrackingResponseData;
use SmartDato\PostIt\Data\WaybillRequestData;
use SmartDato\PostIt\Data\WaybillResponseData;
use SmartDato\PostIt\Exceptions\PostItApiException;
use SmartDato\PostIt\Requests\CreateWaybillRequest;
use SmartDato\PostIt\Requests\TrackShipmentRequest;

/**
 * High-level facade for the Poste Italiane shipping API.
 *
 * Wraps a single authenticated `PosteItalianeConnector`. Construct once per
 * credential pair (e.g. per `CarrierAccount`) and reuse — the underlying
 * authenticator caches the access token in-memory.
 */
final readonly class PostIt
{
    public const string PRODUCTION_BASE_URL = 'https://apiw.gp.posteitaliane.it/gp/internet';

    public const string TEST_BASE_URL = 'https://apid.gp.posteitaliane.it/dev/kindergarden';

    private PosteItalianeConnector $connector;

    public function __construct(
        string $baseUrl,
        string $clientId,
        string $clientSecret,
        string $scope,
        string $grantType = 'client_credentials',
    ) {
        $this->connector = new PosteItalianeConnector(
            baseUrl: $baseUrl,
            clientId: $clientId,
        );

        $this->connector->authenticate(new SessionAuthenticator(
            clientId: $clientId,
            clientSecret: $clientSecret,
            scope: $scope,
            grantType: $grantType,
            authConnector: new PosteItalianeConnector(
                baseUrl: $baseUrl,
                clientId: $clientId,
            ),
        ));
    }

    public static function production(
        string $clientId,
        string $clientSecret,
        string $scope,
        string $grantType = 'client_credentials',
    ): self {
        return new self(self::PRODUCTION_BASE_URL, $clientId, $clientSecret, $scope, $grantType);
    }

    /**
     * Client pointed at the Poste Italiane test environment ("kindergarden").
     */
    public static function test(
        string $clientId,
        string $clientSecret,
        string $scope,
        string $grantType = 'client_credentials',
    ): self {
        return new self(self::TEST_BASE_URL, $clientId, $clientSecret, $scope, $grantType);
    }

    public function connector(): PosteItalianeConnector
    {
        return $this->connector;
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     * @throws PostItApiException
     */
    public function createWaybill(WaybillRequestData $data): WaybillResponseData
    {
        $response = $this->connector->send(new CreateWaybillRequest($data));

        return $response->dto();
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     * @throws PostItApiException
     */
    public function trackShipment(string $waybillNumber, bool $fullHistory = true): TrackingResponseData
    {
        $response = $this->connector->send(new TrackShipmentRequest(
            waybillNumber: $waybillNumber,
            fullHistory: $fullHistory,
        ));

        return $response->dto();
    }

    /**
     * @throws FatalRequestException
     * @throws RequestException
     */
    public function send(Request $request): Response
    {
        return $this->connector->send($request);
    }
}

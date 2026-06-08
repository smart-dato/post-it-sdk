<?php

declare(strict_types=1);

namespace SmartDato\PostIt;

use Illuminate\Contracts\Cache\Repository;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Request;
use Saloon\Http\Response;
use SmartDato\PostIt\Auth\SessionAuthenticator;
use SmartDato\PostIt\Cache\LaravelTokenStore;
use SmartDato\PostIt\Connector\PosteItalianeConnector;
use SmartDato\PostIt\Data\DepositsListFilterData;
use SmartDato\PostIt\Data\DepositsListResponseData;
use SmartDato\PostIt\Data\DepositsReleaseData;
use SmartDato\PostIt\Data\DepositsReleaseResponseData;
use SmartDato\PostIt\Data\NationDetailsResponseData;
use SmartDato\PostIt\Data\NationsResponseData;
use SmartDato\PostIt\Data\PickupBookingData;
use SmartDato\PostIt\Data\PickupBookingResponseData;
use SmartDato\PostIt\Data\PickupReportFilterData;
use SmartDato\PostIt\Data\PickupReportResponseData;
use SmartDato\PostIt\Data\TaricResponseData;
use SmartDato\PostIt\Data\TrackingResponseData;
use SmartDato\PostIt\Data\WaybillRequestData;
use SmartDato\PostIt\Data\WaybillResponseData;
use SmartDato\PostIt\Exceptions\PostItApiException;
use SmartDato\PostIt\Requests\BookPickupRequest;
use SmartDato\PostIt\Requests\CreateWaybillRequest;
use SmartDato\PostIt\Requests\GetNationDetailsRequest;
use SmartDato\PostIt\Requests\GetPickupReportRequest;
use SmartDato\PostIt\Requests\ListDepositsRequest;
use SmartDato\PostIt\Requests\ListNationsRequest;
use SmartDato\PostIt\Requests\ListTaricRequest;
use SmartDato\PostIt\Requests\ReleaseDepositRequest;
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
        ?Repository $cache = null,
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
            tokenStore: $cache instanceof Repository ? new LaravelTokenStore($cache) : null,
        ));
    }

    public static function production(
        string $clientId,
        string $clientSecret,
        string $scope,
        string $grantType = 'client_credentials',
        ?Repository $cache = null,
    ): self {
        return new self(self::PRODUCTION_BASE_URL, $clientId, $clientSecret, $scope, $grantType, $cache);
    }

    /**
     * Client pointed at the Poste Italiane test environment ("kindergarden").
     */
    public static function test(
        string $clientId,
        string $clientSecret,
        string $scope,
        string $grantType = 'client_credentials',
        ?Repository $cache = null,
    ): self {
        return new self(self::TEST_BASE_URL, $clientId, $clientSecret, $scope, $grantType, $cache);
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
     * List the countries managed for international products.
     *
     * @throws FatalRequestException
     * @throws RequestException
     * @throws PostItApiException
     */
    public function listNations(): NationsResponseData
    {
        $response = $this->connector->send(new ListNationsRequest);

        return $response->dto();
    }

    /**
     * Detailed country data sheet for a given ISO4 country and APTUS product.
     *
     * @throws FatalRequestException
     * @throws RequestException
     * @throws PostItApiException
     */
    public function getNationDetails(string $countryCode, string $productCode): NationDetailsResponseData
    {
        $response = $this->connector->send(new GetNationDetailsRequest(
            countryCode: $countryCode,
            productCode: $productCode,
        ));

        return $response->dto();
    }

    /**
     * The TARIC list for extra-EU standard products.
     *
     * @throws FatalRequestException
     * @throws RequestException
     * @throws PostItApiException
     */
    public function listTaric(): TaricResponseData
    {
        $response = $this->connector->send(new ListTaricRequest);

        return $response->dto();
    }

    /**
     * Create, edit or delete a pickup booking.
     *
     * @throws FatalRequestException
     * @throws RequestException
     * @throws PostItApiException
     */
    public function bookPickup(PickupBookingData $data): PickupBookingResponseData
    {
        $response = $this->connector->send(new BookPickupRequest($data));

        return $response->dto();
    }

    /**
     * List pickups matching a filter (date range capped at 10 days).
     *
     * @throws FatalRequestException
     * @throws RequestException
     * @throws PostItApiException
     */
    public function getPickupReport(PickupReportFilterData $filter): PickupReportResponseData
    {
        $response = $this->connector->send(new GetPickupReportRequest($filter));

        return $response->dto();
    }

    /**
     * List deposited shipments matching a filter (date range capped at 10 days).
     *
     * @throws FatalRequestException
     * @throws RequestException
     * @throws PostItApiException
     */
    public function listDeposits(DepositsListFilterData $filter): DepositsListResponseData
    {
        $response = $this->connector->send(new ListDepositsRequest($filter));

        return $response->dto();
    }

    /**
     * Request a release action for one or more deposited waybills.
     *
     * @throws FatalRequestException
     * @throws RequestException
     * @throws PostItApiException
     */
    public function releaseDeposit(DepositsReleaseData $data): DepositsReleaseResponseData
    {
        $response = $this->connector->send(new ReleaseDepositRequest($data));

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

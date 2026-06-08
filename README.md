# Poste Italiane SDK for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/smart-dato/post-it-sdk.svg?style=flat-square)](https://packagist.org/packages/smart-dato/post-it-sdk)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/smart-dato/post-it-sdk/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/smart-dato/post-it-sdk/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/smart-dato/post-it-sdk/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/smart-dato/post-it-sdk/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/smart-dato/post-it-sdk.svg?style=flat-square)](https://packagist.org/packages/smart-dato/post-it-sdk)

Saloon-based client for the Poste Italiane (POST_IT) shipping API.

- OAuth-style session authentication (`POST /user/sessions`) with in-memory token caching
- Waybill creation (`POST /postalandlogistics/parcel/waybill`) — returns label PDF URL
- Shipment tracking (`POST /postalandlogistics/parcel/tracking`) — returns normalised events
- Typed readonly DTOs for every request and response payload
- Mockable end-to-end via Saloon's `MockClient`

## Installation

```bash
composer require smart-dato/post-it-sdk
```

The service provider is auto-discovered. Optionally publish the config file:

```bash
php artisan vendor:publish --tag=post-it-sdk-config
```

## Configuration

The SDK is **credential-free by default** — it does not read credentials from
config or env. Pass them explicitly when constructing `PostIt`. The published
config file (`config/post-it-sdk.php`) is provided as a convenience for
single-account integrations that want to centralise defaults; multi-tenant
applications typically store credentials per `CarrierAccount` row.

```php
use SmartDato\PostIt\PostIt;

// Production (uses confirmed PRODUCTION_BASE_URL = https://apiw.gp.posteitaliane.it/gp/internet):
$client = PostIt::production(
    clientId: 'your-client-id',
    clientSecret: 'your-client-secret',
    scope: 'shipping',
);

// Or, for a custom base URL (test environment, on-premise, alternate contract):
$client = new PostIt(
    baseUrl: 'https://your-tenant.posteitaliane.it/gp/internet',
    clientId: 'your-client-id',
    clientSecret: 'your-client-secret',
    scope: 'shipping',
    grantType: 'client_credentials',
);
```

## Creating a waybill

```php
use SmartDato\PostIt\Constants\PrintFormat;
use SmartDato\PostIt\Data\AddressData;
use SmartDato\PostIt\Data\DeclarationData;
use SmartDato\PostIt\Data\ServicesData;
use SmartDato\PostIt\Data\WaybillData;
use SmartDato\PostIt\Data\WaybillRequestData;
use SmartDato\PostIt\Enums\PaymentModeEnum;

$response = $client->createWaybill(new WaybillRequestData(
    costCenterCode: 'CC100',
    shipmentDate: new DateTimeImmutable(),
    waybills: [
        new WaybillData(
            clientReferenceId: 'ORDER-123',
            printFormat: PrintFormat::DEFAULT,        // '1011' — 10×11 cm
            product: 'POSTACELERE',
            sender: new AddressData(
                nameSurname: 'Sender Co',
                contactName: 'Mario Rossi',
                address: 'Via Roma',
                streetNumber: '1',
                zipCode: '00100',
                city: 'Roma',
                cellphone: '393331111111',
                phone: '393331111111',
            ),
            receiver: new AddressData(
                nameSurname: 'Receiver Co',
                contactName: 'Luigi Bianchi',
                address: 'Via Milano',
                streetNumber: '2',
                zipCode: '20100',
                city: 'Milano',
                cellphone: '393332222222',
                phone: '393332222222',
            ),
            declared: [
                new DeclarationData(weightGrams: 1500, heightCm: 20, lengthCm: 30, widthCm: 40),
            ],
            services: new ServicesData(
                multicolloCode: 'APT000901',
                codAmount: 50.0,
                codPaymentMode: PaymentModeEnum::CashOnDelivery,
            ),
        ),
    ],
));

$waybillNumber = $response->waybills[0]['code'];
$labelPdfUrl = $response->waybills[0]['downloadURL'];
```

`PostItApiException` is thrown when the upstream returns
`result.errorCode !== 0` or when the response is missing required fields.

## Tracking a shipment

```php
$tracking = $client->trackShipment($waybillNumber);

foreach ($tracking->events as $event) {
    echo $event->statusCode.' '.$event->statusDescription.' @ '.$event->location.PHP_EOL;
}
```

Pass `fullHistory: false` to receive only the latest tracing state instead of
the entire history.

## Print formats

`printFormat` is a free-form string because Poste Italiane accepts
contract-specific values:

```php
use SmartDato\PostIt\Constants\PrintFormat;

PrintFormat::A4;          // 'A4'
PrintFormat::FORMAT_1011; // '1011'  (10×11 cm — default)
PrintFormat::ZPL;         // 'ZPL'
PrintFormat::DEFAULT;     // alias of FORMAT_1011
```

If your account uses a different value, pass it as a raw string.

## Testing

The SDK tests itself with Saloon's `MockClient`. Consumer applications can do
the same:

```php
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use SmartDato\PostIt\Requests\AuthRequest;
use SmartDato\PostIt\Requests\CreateWaybillRequest;

MockClient::global([
    AuthRequest::class => MockResponse::make(['access_token' => 'fake'], 200),
    CreateWaybillRequest::class => MockResponse::make([
        'costCenterCode' => 'CC',
        'contractCode' => 'CT',
        'waybills' => [['code' => 'WB1', 'downloadURL' => 'https://...']],
    ], 200),
]);

// ... your code that calls $client->createWaybill(...) ...

MockClient::destroyGlobal();
```

## Integration tests (live API)

The default suite is fully mocked. A separate `tests/Integration` suite hits
the real Poste Italiane **test environment** ("kindergarden",
`PostIt::TEST_BASE_URL`). Those tests **skip themselves** unless the required
env vars are set, so they never break CI:

```bash
export POST_IT_TEST_CLIENT_ID='...'        # see docs/MANUALE WS PDB for the sandbox client/secret
export POST_IT_TEST_CLIENT_SECRET='...'
export POST_IT_TEST_SCOPE='api://8f0f2c58-19a8-45ef-9f9e-8bcb0acc7657/.default'

# optional overrides
export POST_IT_TEST_BASE_URL='https://apid.gp.posteitaliane.it/dev/kindergarden'
export POST_IT_TEST_WAYBILL='ZA123456789IT'   # tracking sample
export POST_IT_TEST_COST_CENTER='CDC-...'     # enables the live waybill-creation test

composer test:integration
```

`PostIt::test(...)` is a convenience factory pointed at the test environment,
mirroring `PostIt::production(...)`.

## Quality gate

```bash
composer test             # pint + phpstan + pest (mocked Unit + Feature)
composer test:lint        # pint --test
composer test:types       # phpstan analyse
composer test:unit        # pest (Unit + Feature)
composer test:integration # pest (live API; skipped without POST_IT_TEST_* env)
composer lint             # pint (fix)
```

## License

MIT — see `LICENSE.md`.

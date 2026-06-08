# Poste Italiane SDK for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/smart-dato/post-it-sdk.svg?style=flat-square)](https://packagist.org/packages/smart-dato/post-it-sdk)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/smart-dato/post-it-sdk/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/smart-dato/post-it-sdk/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/smart-dato/post-it-sdk/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/smart-dato/post-it-sdk/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/smart-dato/post-it-sdk.svg?style=flat-square)](https://packagist.org/packages/smart-dato/post-it-sdk)

Saloon-based client for the Poste Italiane (POST_IT) shipping API.

- OAuth-style session authentication (`POST /user/sessions`) with per-account token caching — in-memory by default, or a shared cache across processes
- Waybill creation (`POST /postalandlogistics/parcel/waybill`) — domestic **and** international, returns the label PDF URL
- Shipment tracking (`POST /postalandlogistics/parcel/tracking`) — returns normalised events
- International lookups — countries (`/international/nations`), country/product detail (`/international/nation/details`) and TARIC codes (`/international/taric`)
- Pickups & deposits — book/edit/cancel a pickup (`/pickup`), pickup report (`/pickupReport`), deposits list (`/depositsList`) and release (`/depositsRelease`)
- Typed readonly DTOs for every request/response payload, with enums (`PrintFormat`, `Product`, `PaymentMode`, `ReceiverType`, `BookingType`, `TimeSlot`, `PickupOperation`, `ReleaseAction`) and a lenient `make()` factory
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

### Token caching (multi-account)

By default the access token is cached **in-memory on the instance** and
refreshed automatically as it nears the `expires_in` deadline. Pass a Laravel
cache repository to share tokens **across requests and processes**:

```php
use Illuminate\Support\Facades\Cache;

$client = PostIt::production(
    clientId: $account->client_id,
    clientSecret: $account->client_secret,
    scope: $account->scope,
    cache: Cache::store('redis'),
);
```

The cache key is scoped per account — `post-it:token:{clientId}:{hash}`, where
the hash folds in the base URL, scope, grant type, and secret. Several accounts
may therefore share a single cache store and **will never be served each
other's token**; a rotated secret transparently invalidates the cached entry.

## Creating a waybill

```php
use SmartDato\PostIt\Data\AddressData;
use SmartDato\PostIt\Data\DeclarationData;
use SmartDato\PostIt\Data\ServicesData;
use SmartDato\PostIt\Data\WaybillData;
use SmartDato\PostIt\Data\WaybillRequestData;
use SmartDato\PostIt\Enums\PaymentMode;
use SmartDato\PostIt\Enums\PrintFormat;
use SmartDato\PostIt\Enums\Product;

$response = $client->createWaybill(new WaybillRequestData(
    costCenterCode: 'CC100',
    shipmentDate: new DateTimeImmutable(),
    waybills: [
        new WaybillData(
            clientReferenceId: 'ORDER-123',
            printFormat: PrintFormat::default(),      // '1011' — 10×11 cm
            product: Product::Express,                // 'APT000901'
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
                codPaymentMode: PaymentMode::CashOnDelivery,
            ),
        ),
    ],
));

$waybillNumber = $response->waybills[0]['code'];
$labelPdfUrl = $response->waybills[0]['downloadURL'];
```

`PostItApiException` is thrown when the upstream returns
`result.errorCode !== 0` or when the response is missing required fields.

## International shipments

For international products (`APT000903` / `APT000904` / `APT001013`) add an
`InternationalData` block and the customs fields on each declaration. Sender
and receiver require `contactName`, `email`, `phone`, and a `province` for
US/Canada destinations.

```php
use SmartDato\PostIt\Data\InternationalData;
use SmartDato\PostIt\Data\ItemData;
use SmartDato\PostIt\Enums\ReceiverType;

new WaybillData(
    clientReferenceId: 'ORDER-INT-1',
    printFormat: PrintFormat::A4,             // ZPL is not allowed for international
    product: Product::InternationalStandard,  // 'APT000904'
    sender: $sender,
    receiver: $receiver,                       // country e.g. 'GER1', countryName 'Germania'
    declared: [
        new DeclarationData(
            weightGrams: 3000, heightCm: 10, lengthCm: 50, widthCm: 25,
            description: 'Merce non destinata alla vendita',
            packagingCode: 'C',
            nationality: 'IT',
            items: [
                // required for APT000904 / APT001013; itemNumber is auto-assigned
                new ItemData(taric: '6109100010', totalValueCents: 5000, quantity: 2, totalWeightGrams: 1500, originCountry: 'IT'),
            ],
        ),
    ],
    international: new InternationalData(
        receiverType: ReceiverType::BusinessDelivery,
        currency: 'EUR',
        waybillTotalValue: '400',
        contentCode: '11',
    ),
);
```

The customs/`international` fields are only serialised when set, so domestic
payloads are unaffected.

## Tracking a shipment

```php
$tracking = $client->trackShipment($waybillNumber);

foreach ($tracking->events as $event) {
    echo $event->statusCode.' '.$event->statusDescription.' @ '.$event->location.PHP_EOL;
}
```

Each `TrackingEventData` also exposes `occurredAt` (`?DateTimeImmutable`),
`phase`, and `synthesisStatusDescription`. Pass `fullHistory: false` to receive
only the latest tracing state instead of the entire history.

## International lookups

These supporting endpoints feed the data needed to compile international
waybills. The country/TARIC lists take no request body.

```php
$nations = $client->listNations();                 // NationsResponseData
foreach ($nations->nations as $nation) {
    echo $nation->iso4.' '.$nation->name.PHP_EOL;   // iso4, iso2, extraEu, states[], products[]
}

$taric = $client->listTaric();                      // extra-EU standard products only
echo $taric->taric[0]->code.' '.$taric->taric[0]->englishDescription;

// Detailed sheet for a country + product: allowed contents, required docs, transit times, customs notes.
$details = $client->getNationDetails('FRA1', Product::InternationalStandard->value);
$details->carriers['EURODIS']->contents;            // ContentTypeData[] with attachments + deliveryTimes
$details->customsByProduct['APT000904']['customsInfo'];
```

## Pickups & deposits

```php
use SmartDato\PostIt\Data\PickupAddressData;
use SmartDato\PostIt\Data\PickupBookingData;
use SmartDato\PostIt\Data\PickupContentData;
use SmartDato\PostIt\Data\PickupReportFilterData;
use SmartDato\PostIt\Data\DepositsListFilterData;
use SmartDato\PostIt\Data\DepositsReleaseData;
use SmartDato\PostIt\Enums\BookingType;
use SmartDato\PostIt\Enums\PickupOperation;
use SmartDato\PostIt\Enums\ReleaseAction;
use SmartDato\PostIt\Enums\TimeSlot;

// Book a pickup — `where` is the only mandatory address.
$booking = $client->bookPickup(new PickupBookingData(
    operation: PickupOperation::Add,
    bookingType: BookingType::Multiple,
    where: new PickupAddressData(givenName: 'Acme Srl', streetName: 'Via Roma', streetNumber: '1', town: 'Roma', region: 'RM', postCode: '00100', country: 'IT'),
    pickupDate: '20260610',                         // examples use YYYYMMDD
    timeSlot: TimeSlot::Morning,
    contents: [new PickupContentData(containerType: 'P', quantity: 3, weightKg: 5, heightCm: 20, widthCm: 30, lengthCm: 40)],
));
$booking->bookingId;

// Report (date range capped at 10 days), deposits list and release.
$report = $client->getPickupReport(new PickupReportFilterData(dateFrom: '2026-06-01', dateTo: '2026-06-08'));
$deposits = $client->listDeposits(new DepositsListFilterData(dateFrom: '20260601', dateTo: '20260608'));

$release = $client->releaseDeposit(new DepositsReleaseData(
    shipmentId: 'ZA123456789IT',
    releaseAction: ReleaseAction::DeliverToAnotherAddress,
    address: new PickupAddressData(givenName: 'Mario Rossi', streetName: 'Via Milano', streetNumber: '2', town: 'Milano', postCode: '20100'),
));
$release->failed();                                 // per-barcode outcomes that returned KO
```

The pickup/deposit responses report success via an `OK`/`KO` outcome; the SDK
throws `PostItApiException` on failure (except per-barcode release outcomes,
which are exposed on `DepositsReleaseResponseData::$items` / `failed()`).

> **Note:** date formats and a few field names differ between the manual's
> tables and its JSON examples (e.g. `pickupDate` as `YYYYMMDD` vs `YYYY-MM-DD`,
> `content`/`tipocontText`). The SDK follows the example payloads and passes
> dates through as strings — verify against the test environment for your contract.

## Enums for fixed values

Documented fixed-value fields are typed enums. Each exposes a lenient
`make()` factory (trims, matches case-insensitively on value **or** case name,
throws `ValueError` on a miss) and a null-returning `tryMake()`:

```php
use SmartDato\PostIt\Enums\PrintFormat;
use SmartDato\PostIt\Enums\Product;
use SmartDato\PostIt\Enums\PaymentMode;

PrintFormat::A4;            // 'A4'
PrintFormat::FORMAT_1011;   // '1011' (10×11 cm)
PrintFormat::ZPL;           // 'ZPL'
PrintFormat::default();     // PrintFormat::FORMAT_1011

PrintFormat::make('1011');  // PrintFormat::FORMAT_1011
Product::make('APT000901'); // Product::Express
PaymentMode::tryMake($raw); // PaymentMode|null
```

`WaybillData::$printFormat` and `$product` accept the enum **or** a raw
string, so contract-specific values not modelled here still pass through
unchanged.

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

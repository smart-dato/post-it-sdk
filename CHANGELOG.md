# Changelog

All notable changes to `Poste Italiane SDK for Laravel` will be documented in this file.

## 0.0.4 - 2026-06-12

### Added

- Optional `offeringType` field on the `InternationalData` block, serialised only when set.

## 0.0.3 - 2026-06-08

### Added

- Complete coverage of the v1.9 API manual — every documented service now has a typed `PostIt` method.
  - International lookups: countries (`listNations()`), country/product detail (`getNationDetails()`), TARIC codes (`listTaric()`), extra services & carrier (`getServices()`) and the international PUDO location finder (`findInternationalPudos()`).
  - Pickups & deposits: `bookPickup()`, `getPickupReport()`, `listDeposits()`, `releaseDeposit()`.
  - Proof of delivery: `requestDigipod()`, `downloadDigipod()`.
  - Delivery point master data (`findDeliveryPoints()`), transit-time estimates (`getTransitTime()`) and the Green Index emissions dashboard (`getGreenIndex()`).
- New typed enums: `BookingType`, `TimeSlot`, `PickupOperation`, `ReleaseAction`, `DeliveryPointServiceType`.
- Typed request/response DTOs for every new endpoint, mockable end-to-end via Saloon's `MockClient`.

## 0.0.2 - 2026-06-08

### Added

- International shipment support: `InternationalData` block, `ItemData` customs lines (`declared[].items[]` with TARIC), declaration customs fields (`description`, `contentCode`, `packagingCode`, `nationality`), and address `province`.
- Per-account token cache with an optional shared store — pass a Laravel cache repository via the new `cache:` parameter on `PostIt` / `production()` / `test()`. Tokens are keyed by `clientId`, so accounts never share a token, and refresh automatically as they near `expires_in`.
- Typed enums for fixed values (`PrintFormat`, `Product`, `PaymentMode`, `ReceiverType`) with a lenient `make()` / `tryMake()` factory.
- Live-API integration test suite (`composer test:integration`) and a `PostIt::test()` factory for the test ("kindergarden") environment.

### Fixed

- Tracking response is parsed against the documented `return` envelope (`shipment[].tracking[]`); previously it matched an invented shape and returned no events.
- Paperless waybills no longer raise an error when no `downloadURL` is returned.
- `lastTracingState` sends a valid `{Y, N}` value.
- `shipmentDate` is converted to UTC before formatting.
- Per-waybill response errors are surfaced; the waybill response also exposes `internationalCode`, `internationalCode2`, and `downloadUrlImg`.

### Changed (breaking)

- `Constants\PrintFormat` (a constants class) is removed in favour of the backed enum `Enums\PrintFormat`.
- `Enums\PaymentModeEnum` is renamed to `Enums\PaymentMode`.
- Removed the unused `session_cache_ttl` config key.

## 0.0.1 - 2026-05-08

- Initial release: Saloon-based client for the Poste Italiane (POST_IT) shipping API with typed DTOs.

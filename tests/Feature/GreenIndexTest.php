<?php

declare(strict_types=1);

use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use SmartDato\PostIt\Data\GreenIndexFilterData;
use SmartDato\PostIt\Data\GreenIndexResponseData;
use SmartDato\PostIt\PostIt;
use SmartDato\PostIt\Requests\AuthRequest;
use SmartDato\PostIt\Requests\GetGreenIndexRequest;

afterEach(fn () => MockClient::destroyGlobal());

function makeGreenPostIt(): PostIt
{
    return new PostIt(
        baseUrl: 'https://api.test',
        clientId: 'cli-1',
        clientSecret: 'sec-1',
        scope: 'shipping',
        grantType: 'client_credentials',
    );
}

it('parses the green index emissions, matrix and trend', function (): void {
    $mock = MockClient::global([
        AuthRequest::class => MockResponse::make(['access_token' => 'tok'], 200),
        GetGreenIndexRequest::class => MockResponse::make([
            'issuer' => null,
            'timestamp' => '2025-05-21T09:35:07.887',
            'emissioni' => [
                'cdc' => ['CDC-00073352'],
                'prodotto' => ['PDB Standard', 'PDB Express'],
                'comparatore' => 291.68,
                'matrice' => [
                    ['fase' => 'Ritiro/Accettazione', 'tonn_km' => 11.97, 'tot_ldv' => 14, 'tot_emissioni_ghg' => 9.95576, 'perc_veicoli_basse_emissioni' => 0.0, 'media_emissioni_pacco' => 0.711, 'media_emissioni_tkm' => 0.831, 'perc_emissioni_fase' => 21.18],
                ],
                'tot_emissioni' => 47.00162,
                'tot_spedizioni_calcolate' => 15,
                'tot_km' => 11479.0,
                'media_km' => 765.27,
                'data_aggiornamento' => '2024-12-20',
            ],
            'trend' => [
                ['anno' => '2024', 'yoy' => 0.0, 'emissioni_annuali' => 47.00162, 'emissioni_medie' => 3.9168, 'dettaglio' => [
                    ['mese' => '10', 'ytd' => 2.6e7, 'emissioni_mensili' => 8.97919, 'variazioni_mensili' => 6.60336, 'spedizioni_mensili' => 2],
                ]],
            ],
            'codice_cliente' => '1413084351',
        ], 200),
    ]);

    $response = makeGreenPostIt()->getGreenIndex(new GreenIndexFilterData(
        acceptanceTypes: ['TUTTE'], deliveryTypes: ['TUTTE'], costCenters: ['CDC-00073352'],
        products: ['PDB Standard', 'PDB Express'],
    ));

    expect($response)->toBeInstanceOf(GreenIndexResponseData::class)
        ->and($response->customerCode)->toBe('1413084351')
        ->and($response->emissions?->comparator)->toBe(291.68)
        ->and($response->emissions?->totalEmissions)->toBe(47.00162)
        ->and($response->emissions?->matrix[0]->phase)->toBe('Ritiro/Accettazione')
        ->and($response->emissions?->matrix[0]->totalLdv)->toBe(14)
        ->and($response->trends[0]->year)->toBe('2024')
        ->and($response->trends[0]->details[0]['monthlyShipments'])->toBe(2);

    /** @var array<string, mixed> $body */
    $body = $mock->findResponseByRequest(GetGreenIndexRequest::class)?->getPendingRequest()->body()->all() ?? [];

    expect($body)->toHaveKey('filtri')
        ->and($body['filtri'])->toMatchArray([
            'tipo_accettazione' => ['TUTTE'],
            'tipo_consegna' => ['TUTTE'],
            'cdc' => ['CDC-00073352'],
            'prodotto' => ['PDB Standard', 'PDB Express'],
        ]);
});

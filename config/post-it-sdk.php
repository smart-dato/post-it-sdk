<?php

declare(strict_types=1);

use SmartDato\PostIt\PostIt;

return [
    'base_url' => env('POST_IT_BASE_URL', PostIt::PRODUCTION_BASE_URL),

    'auth' => [
        'client_id' => env('POST_IT_CLIENT_ID', ''),
        'client_secret' => env('POST_IT_CLIENT_SECRET', ''),
        'scope' => env('POST_IT_SCOPE', ''),
        'grant_type' => env('POST_IT_GRANT_TYPE', 'client_credentials'),
    ],

    'session_cache_ttl' => env('POST_IT_SESSION_CACHE_TTL', 3500),
];

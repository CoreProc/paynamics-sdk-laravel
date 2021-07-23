<?php

return [
    'merchantId' => env('PAYNAMICS_MERCHANT_ID'),

    'merchantKey' => env('PAYNAMICS_MERCHANT_KEY'),

    'environment' => env('PAYNAMICS_ENVIRONMENT', 'sandbox'),

    'endpoint' => [
        'sandbox' => env('PAYNAMICS_SANDBOX_ENDPOINT'),
        'production' => env('PAYNAMICS_PRODUCTION_ENDPOINT'),
    ],

    'responseUrl' => env('PAYNAMICS_RESPONSE_URL'),

    'mtacUrl' => env('PAYNAMICS_MTAC_URL'),

    'cancelUrl' => env('PAYNAMICS_CANCEL_URL'),
];
<?php

return [

    'merchant_id' => env('PAYGATE_MERCHANT_ID',''),

    'merchant_key' => env('PAYGATE_MERCHANT_KEY',''),

    'sandbox' => env('PAYGATE_SANDBOX', true),

    'url' => [

        'sandbox' => env('PAYGATE_SANDBOX_URL', 'https://testpti.payserv.net/webpaymentV2/default.aspx'),

        'production' => env('PAYGATE_PRODUCTION_URL', ''),

    ]

];

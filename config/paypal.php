<?php
return [
    'mode'    => env('PAYPAL_MODE', 'LIVE'),

    'sandbox' => [
        'client_id'         => env('PAYPAL_SANDBOX_CLIENT_ID', 'AZp22rGSpvsorKZv4aVvGNZjEHTMuxaqod0Wp1KoiVyOCFQ0-GPlftbfHANEBVGzRPaRHp4wp-6RoE3r'),
        'client_secret'     => env('PAYPAL_SANDBOX_CLIENT_SECRET', 'ECtb0H9wqEMRAUVL4wscZS1nh4Nx3fnCXv4ctIm-cVzvqvQkS42_XwBTyUynbc3rFow1cfUWPuYa-D6b'),
        'app_id'            => 'APP-80W284485P519543T',
    ],

    'live' => [
        'client_id'         => env('PAYPAL_LIVE_CLIENT_ID', 'ATISy9Q7g7Jmo-CoNhvV1Kny5cWtlO68_FCtD01v3w7GVkqqrb_y07g4wAlvXh2G9Smn30ihhD0WmQdZ'),
        'client_secret'     => env('PAYPAL_LIVE_CLIENT_SECRET', 'EErn2W6Dg2ztF6dF2RkXBMAIX1FVdZUQp1U_jLjH1W8XDmwmqw4x5nLNXQCUMeaNYH54w2VSktUYFuIf'),
        'app_id'            => '',
    ],

    'payment_action' => env('PAYPAL_PAYMENT_ACTION', 'Sale'),
    'currency'       => env('PAYPAL_CURRENCY', 'USD'),
    'notify_url'     => env('PAYPAL_NOTIFY_URL', ''),
    'locale'         => env('PAYPAL_LOCALE', 'en_US'),
    'validate_ssl'   => env('PAYPAL_VALIDATE_SSL', false),

    'client_id' => 'AZp22rGSpvsorKZv4aVvGNZjEHTMuxaqod0Wp1KoiVyOCFQ0-GPlftbfHANEBVGzRPaRHp4wp-6RoE3r',
	'secret' => 'ECtb0H9wqEMRAUVL4wscZS1nh4Nx3fnCXv4ctIm-cVzvqvQkS42_XwBTyUynbc3rFow1cfUWPuYa-D6b',
    'settings' => array(
        'mode' => 'sandbox',
        'http.ConnectionTimeOut' => 1000,
        'log.LogEnabled' => true,
        'log.FileName' => storage_path() . '/logs/paypal.log',
        'log.LogLevel' => 'FINE'
    ),

];
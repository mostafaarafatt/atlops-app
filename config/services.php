<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'smsKey' => [
//        'Key' => env('SMS_API_KEY'),
//        'site' => env('SMS_SITE'),
//        'title' => env('SMS_TITLE'),
    ],

    'customerOneSignal' => [
        'app_id' => env('ONESIGNAL_APP_ID_CUSTOMER'),
        'rest_api_key' => env('ONESIGNAL_REST_API_KEY_CUSTOMER')
    ],

    'map' => [
        'map_key' => env('GOOGLE_MAPS_API_KEY'),
     ],
     'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],
     'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],
];


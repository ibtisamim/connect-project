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

    'onesignal' => [
        'app_id' => env('ONESIGNAL_APP_ID'),
        'rest_api_key' => env('ONESIGNAL_REST_API_KEY')
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

  'facebook' => [
    'client_id' => '1677024492481963',
    'client_secret' => 'b1068ca680461b2042ff0ceb6e83eaa0',
    'redirect' => 'http://localhost:8000/auth/facebook/callback',
  ],

  'google' => [
    'client_id' => '496140178039-rg5p79nlvqrok1mqj07pr5tknjjsjb7l.apps.googleusercontent.com',
    'client_secret' => 'r9f_VhYyb52dRN2CHKk3Xcbx',
    'redirect' => 'http://localhost:8000/auth/google/callback',
  ],

];

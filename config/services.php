<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'twitter' => [
        'client_id'     => "tYdL7JJc4k9c0v6bFPVdiL7Xb",
        'client_secret' => "mJ9XUzufVd6Xee2zJrvbFN7GN5ecCzOYcpG5KP7WMn7fVzMxqA",
        'redirect'      => "http://localhost:8000/login/twitter/callback",
    ],

    'facebook' => [
        'client_id'     => '152195688896762',
        'client_secret' => env('FACEBOOK_SECRET'),
        'redirect'      => 'http://localhost:8000/login/facebook/callback',
    ],

    'google' => [
        'client_id'     => "891870177320-088pt0oouf2t4le64om8dcui740o5ifl.apps.googleusercontent.com",
        'client_secret' => "mnasuYIi8WP4h0WDPSxGGXyt",
        'redirect' => "http://localhost:8000/login/google/callback",
   
    ],
    'github' => [
        'client_id' => env('GITHUB_CLIENT_ID'),         // Your GitHub Client ID
        'client_secret' => env('GITHUB_CLIENT_SECRET'), // Your GitHub Client Secret
        'redirect' => 'http://localhost:8000/login/github/callback',
    ],

];

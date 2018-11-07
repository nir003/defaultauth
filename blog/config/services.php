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

    'google' => [
        'client_id' => '953687903301-0eo05clk0amn74ovcop431gm8dj0t1s0.apps.googleusercontent.com',
        'client_secret' => 'LHRV1xw3X6Pnsw3XlgOervab',
        'redirect' => 'http://localhost/laravel/defaultauth/blog/public/login/google/callback',
    ],

    'facebook' => [
        'client_id' => '1522119087932263',
        'client_secret' => 'dab5006761762d95f465818c2a94bdd4',
        'redirect' => 'http://localhost/laravel/defaultauth/blog/public/login/facebook/callback',
    ],

];

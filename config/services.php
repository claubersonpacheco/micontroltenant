<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    */

    'bunny' => [
        'storage_zone'     => env('BUNNY_STORAGE_ZONE'),
        'storage_region'   => env('BUNNY_STORAGE_REGION'),
        'storage_password' => env('BUNNY_STORAGE_PASSWORD'),
        'cdn_url'          => env('BUNNY_URL_PUBLIC'),
    ],
    'generate_pdf'=> env('APP_ENV', 'production'),


];

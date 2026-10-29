<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application URLs
    |--------------------------------------------------------------------------
    |
    | These URLs are used throughout the application for various purposes
    | including API calls, redirects, and external integrations.
    |
    */

    // Base URLs
    'base' => [
        'web' => env('BASE_WEB_URL', 'http://localhost:8000'),
        'api' => env('BASE_API_URL', 'http://localhost:8000'),
        'admin' => env('BASE_ADMIN_URL', 'http://localhost:8000'),
    ],

    // Storage & CDN URLs
    'storage' => [
        'image_upload' => env('STORAGE_IMAGE_URL', 'http://localhost:8000/storage/images'),
        'google_cloud_workspace' => env('GCS_WORKSPACE_ID', 'workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887'),
        'google_cloud_base' => env('GCS_BASE_URL', 'https://storage.googleapis.com'),
        'assets_base' => env('ASSETS_BASE_URL', 'http://localhost:8000'),
    ],

    // External Services
    'external' => [
        'placeholder_image' => env('PLACEHOLDER_IMAGE_URL', 'https://www.edusav.com/images/NU/video/Azdan.png'),
    ],

    // Social Media Icons (Google Cloud Storage)
    'social_icons' => [
        'facebook' => env('SOCIAL_ICON_FACEBOOK', 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/93a3212f-25ff-4ac6-b507-119de3daf31f.png'),
        'twitter' => env('SOCIAL_ICON_TWITTER', 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/2aed0bbd-40b9-48e0-8b58-1760e8bbde02.png'),
        'instagram' => env('SOCIAL_ICON_INSTAGRAM', 'https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/1cc59efe-223c-47aa-ba0c-2d7b5b3aae0b.png'),
    ],

    // Payment Gateway URLs
    'payment' => [
        'doku' => [
            'base_url' => env('DOKU_BASE_URL', 'https://sandbox.doku.com'),
            'checkout_js' => env('DOKU_CHECKOUT_JS_URL', 'https://sandbox.doku.com/jokul-checkout-js/v1/jokul-checkout-1.0.0.js'),
            'api_endpoint' => env('DOKU_API_ENDPOINT', env('BASE_API_URL', 'http://localhost:8001').'/api/doku/payment'),
        ],
    ],

    // Callback URLs
    'callbacks' => [
        'payment_success' => env('PAYMENT_SUCCESS_URL', env('BASE_WEB_URL', 'http://localhost:8000').'/dashboard'),
        'payment_callback' => env('PAYMENT_CALLBACK_URL', env('BASE_WEB_URL', 'http://localhost:8000').'/dashboard'),
        'registration' => env('REGISTRATION_URL', env('BASE_WEB_URL', 'http://localhost:8000').'/registration'),
    ],

];

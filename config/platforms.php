<?php

/**
 * Platform Detection & Configuration
 * Auto-detects hosting platform and applies appropriate settings
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Auto-detect App URL
    |--------------------------------------------------------------------------
    | Automatically determine the app URL from the current request
    */
    'auto_detect_url' => env('APP_URL') === '' || env('APP_URL') === null,

    /*
    |--------------------------------------------------------------------------
    | Supported Platforms
    |--------------------------------------------------------------------------
    */
    'platforms' => [
        'infinityfree' => [
            'domains' => ['.infinityfreeapp.com'],
            'protocol' => 'https',
            'storage_path' => 'storage',
            'public_path' => 'public',
            'cache_driver' => 'file',
            'session_driver' => 'cookie',
        ],
        'godaddy' => [
            'domains' => ['.godaddy.com', '.com', '.net', '.org'],
            'protocol' => 'https',
            'storage_path' => 'storage',
            'public_path' => 'public',
            'cache_driver' => 'file',
            'session_driver' => 'cookie',
        ],
        'hostinger' => [
            'domains' => ['.hostinger.com'],
            'protocol' => 'https',
            'storage_path' => 'storage',
            'public_path' => 'public',
            'cache_driver' => 'file',
            'session_driver' => 'cookie',
        ],
        'bluehost' => [
            'domains' => ['.bluehost.com'],
            'protocol' => 'https',
            'storage_path' => 'storage',
            'public_path' => 'public',
            'cache_driver' => 'file',
            'session_driver' => 'cookie',
        ],
        'local' => [
            'domains' => ['localhost', '127.0.0.1'],
            'protocol' => 'http',
            'storage_path' => 'storage',
            'public_path' => 'public',
            'cache_driver' => 'file',
            'session_driver' => 'file',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Deployment Instructions
    |--------------------------------------------------------------------------
    */
    'deployment' => [
        'infinityfree' => [
            'description' => 'InfinityFree Hosting',
            'steps' => [
                '1. Upload public/ contents to htdocs/ or public_html/',
                '2. Upload all other Laravel files one level up',
                '3. Create .env file on server with DB credentials',
                '4. SSH: php artisan migrate --force',
                '5. SSH: php artisan cache:clear && php artisan config:clear',
            ],
        ],
        'godaddy' => [
            'description' => 'GoDaddy Hosting',
            'steps' => [
                '1. Upload public/ contents to public_html/',
                '2. Upload all other Laravel files one level up',
                '3. Update .env with GoDaddy DB credentials',
                '4. SSH: php artisan migrate --force',
                '5. SSH: php artisan cache:clear && php artisan config:clear',
            ],
        ],
    ],
];

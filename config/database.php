<?php

return [
    'driver' => env('DB_DRIVER', 'sqlite'),

    'mysql' => [
        'driver' => 'mysql',
        'host' => env('DB_HOST', 'localhost'),
        'database' => env('DB_DATABASE', 'kutaisiphp'),
        'username' => env('DB_USERNAME', 'root'),
        'password' => env('DB_PASSWORD', ''),
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
    ],

    'sqlite' => [
        'driver' => 'sqlite',
        'database' => env('DB_DATABASE', 'database.sqlite'),
    ],

    'pgsql' => [
        'host' => env('DB_HOST', 'localhost'),
        'database' => env('DB_DATABASE', 'kutaisiphp'),
        'username' => env('DB_USERNAME', 'root'),
        'password' => env('DB_PASSWORD', ''),
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
    ],

];
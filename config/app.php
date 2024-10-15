<?php


use App\Providers\DatabaseServiceProvider;

return [
    'name' => env('APP_NAME', 'KutaisiPHP'),
    'debug' => env('APP_DEBUG', false),

    'providers' => [
        App\Providers\AppServiceProvide::class,
        App\Providers\RequestServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
        DatabaseServiceProvider::class,
    ],
];
<?php


use App\Providers\AppServiceProvide;
use App\Providers\DatabaseServiceProvider;
use App\Providers\RequestServiceProvider;
use App\Providers\RouteServiceProvider;
use App\Providers\ViewServiceProvider;

return [
    'name' => env('APP_NAME', 'KutaisiPHP'),
    'debug' => env('APP_DEBUG', false),

    'providers' => [
        AppServiceProvide::class,
        RequestServiceProvider::class,
        RouteServiceProvider::class,
        DatabaseServiceProvider::class,
        ViewServiceProvider::class,
    ],
];
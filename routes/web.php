<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use League\Route\Router;
use Psr\Container\ContainerInterface;

return static function (Router $router, ContainerInterface $container) {

    $router->get('/', HomeController::class);
    $router->get('/dashboard', DashboardController::class);
    $router->get('/users/{user}', UsersController::class);
    $router->get('/register', [RegisterController::class, 'index']);

};
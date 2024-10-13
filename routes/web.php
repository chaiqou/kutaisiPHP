<?php

use Laminas\Diactoros\Response;
use League\Route\Router;
use Psr\Container\ContainerInterface;

return static function (Router $router, ContainerInterface $container) {

    $router->get('/', function () {
        $response = new Response();

        $response->getBody()->write('Hello, World!');

        return $response;
    });

};
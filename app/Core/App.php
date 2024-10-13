<?php

namespace App\Core;

use Laminas\Diactoros\Request;
use Laminas\Diactoros\Response;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use League\Route\Router;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;

class App
{
    protected ServerRequestInterface $request;
    protected Router $router;

    public function __construct(protected ContainerInterface $container)
    {
        $this->router = $this->container->get(Router::class);
        $this->request = $this->container->get(Request::class);
    }

    public function run(): void
    {
        $response = new Response();

        try {
            $response = $this->router->dispatch($this->request);
        } catch (\Exception $e) {
            $response->getBody()->write('An error occurred: ' . $e->getMessage());
        }

        (new SapiEmitter())->emit($response);
    }

    public function getRouter(): Router
    {
        return $this->router;
    }

}
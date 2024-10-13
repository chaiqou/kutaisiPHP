<?php

namespace App\Http;

use Laminas\Diactoros\Response;
use Psr\Http\Message\ServerRequestInterface;

class HomeController
{

    public function __invoke(ServerRequestInterface $request): Response
    {
        $response = new Response();

        $response->getBody()->write($request->getUri()->getPath());

        return $response;
    }

}
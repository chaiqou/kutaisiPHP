<?php

namespace App\Http;

use Laminas\Diactoros\Response;

class HomeController
{

    public function __invoke(): Response
    {
        $response = new Response();

        $response->getBody()->write('Hello, World!');

        return $response;
    }

}
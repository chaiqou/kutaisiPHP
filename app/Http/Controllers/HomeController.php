<?php

namespace App\Http\Controllers;

use App\Views\View;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ServerRequestInterface;

class HomeController
{

    public function __construct(
        protected View $view
    )
    {
    }

    public function __invoke(ServerRequestInterface $request): Response
    {
        $response = new Response();

        $response->getBody()->write(
            $this->view->render('home')
        );

        return $response;
    }

}
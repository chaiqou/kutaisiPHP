<?php

namespace App\Http\Controllers\Auth;

use App\Views\View;
use Cartalyst\Sentinel\Sentinel;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ServerRequestInterface;

class RegisterController
{
    public function __construct(
        protected View $view,
        protected Sentinel $auth,
    )
    {
    }

    public function index(ServerRequestInterface $request): Response
    {
        $response = new Response();

        $response->getBody()->write(
            $this->view->render('register')
        );

        return $response;
    }

    public function store(ServerRequestInterface $request): Response
    {
        $this->auth->registerAndActivate($request->getParsedBody());

        return new Response\RedirectResponse('/dashboard');
    }

}
<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Views\View;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ServerRequestInterface;

class UsersController
{
    public function __construct(
        protected View $view
    )
    {
    }

    public function __invoke(ServerRequestInterface $request, array $arguments): Response
    {
        ['user' => $userId] = $arguments;

        $user = User::find($userId);

        if (!$user) {
            return new Response();
        }
        $response = new Response();

        $response->getBody()->write(
            $this->view->render('user', ['user' => $user])
        );

        return $response;
    }

}
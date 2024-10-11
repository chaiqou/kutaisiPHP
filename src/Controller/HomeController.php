<?php

namespace App\Controller;

use Chaiqou\Framework\Http\Response;

class HomeController
{
    public function index(): Response
    {
        $content = "hello world";

        return new Response($content);
    }

}
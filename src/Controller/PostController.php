<?php

namespace App\Controller;

use Chaiqou\Framework\Http\Response;

class PostController
{
    public function show(int $id): Response
    {
        $content = "Post $id";

        return new Response($content);
    }

}
<?php

namespace Chaiqou\Framework\Http;


use Chaiqou\Framework\Routing\Router;

class Kernel
{
    public function __construct(public Router $router)
    {
    }

    public function handle(Request $request)
    {

        try {
           [$routeHandler, $variables] = $this->router->dispatch($request);

           $response = call_user_func_array($routeHandler, $variables);
        } catch (\Exception $exception) {
            $response = new Response($exception->getMessage(), 400);
        }

        return $response;
    }
}
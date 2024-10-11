<?php

namespace Chaiqou\Framework\Http;

use function FastRoute\simpleDispatcher;

class Kernel
{

    public function handle(Request $request): Response
    {

        $dispatcher = simpleDispatcher(
            function (\FastRoute\RouteCollector $routeCollector) {
                $routeCollector->addRoute('GET', '/', function () {
                    return new Response('<h1>Hello, World!</h1>');
                });
            }
        );

        $routeInfo = $dispatcher
            ->dispatch(
                $request->getMethod(),
                $request->getPathInfo()
            );

        [$status,$handler,$variables] = $routeInfo;

        return $handler($variables);
    }
}
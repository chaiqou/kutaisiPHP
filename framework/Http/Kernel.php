<?php

namespace Chaiqou\Framework\Http;

use function FastRoute\simpleDispatcher;

class Kernel
{

    public function handle(Request $request): Response
    {
        $dispatcher = simpleDispatcher(function (\FastRoute\RouteCollector $routeCollector) {
            $routes = require BASE_PATH . '/app/routes/web.php';
            foreach ($routes as $route) {
                [$method, $path, $handler] = $route;
                $routeCollector->addRoute($method, $path, $handler);
            }
        });

        $routeInfo = $dispatcher
            ->dispatch(
                $request->getMethod(),
                $request->getPathInfo()
            );

        [$status,$handler,$variables] = $routeInfo;

        return $handler($variables);
    }
}
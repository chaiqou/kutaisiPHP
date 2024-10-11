<?php

namespace Chaiqou\Framework\Http;

use function FastRoute\simpleDispatcher;

class Kernel
{

    public function handle(Request $request)
    {
        $dispatcher = simpleDispatcher(function (\FastRoute\RouteCollector $routeCollector) {
            $routes = require BASE_PATH . '/routes/web.php';
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

        [$status, [$controller, $method], $variables] = $routeInfo;


        return (new $controller)->$method(...$variables);
    }
}
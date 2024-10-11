<?php

namespace Chaiqou\Framework\Routing;

use Chaiqou\Framework\Http\Request;
use function FastRoute\simpleDispatcher;

class Router implements RouterInterface
{

    public function dispatch(Request $request): array
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


        return [[new $controller, $method], $variables];
    }
}
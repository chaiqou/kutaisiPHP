<?php

namespace Chaiqou\Framework\Routing;

use Chaiqou\Framework\Http\Request;
use FastRoute\Dispatcher;
use FastRoute\Dispatcher\Result\Matched;
use FastRoute\Dispatcher\Result\MethodNotAllowed;
use FastRoute\Dispatcher\Result\NotMatched;
use function FastRoute\simpleDispatcher;

class Router implements RouterInterface
{

    public function dispatch(Request $request): array
    {
        $routeInfo = $this->extractRouteInfo($request);
        [$status, [$controller, $method], $variables] = $routeInfo;


        return [[new $controller, $method], $variables];
    }

    private function extractRouteInfo(Request $request): Matched|MethodNotAllowed|NotMatched
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

        switch($routeInfo[0]) {
            case Dispatcher::NOT_FOUND:
                throw new \Exception('Route not found', 404);
            case Dispatcher::METHOD_NOT_ALLOWED:
                throw new \Exception('Method not allowed', 405);
            case Dispatcher::FOUND:
                return $routeInfo;
        }
    }
}
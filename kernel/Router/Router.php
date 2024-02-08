<?php

namespace App\Kernel\Router;

class Router
{
    private array $routes=[
        'GET' => [],
        'POST' => [],
    ];
    public function __construct()
    {
        $this->initRoutes();
    }
    public function dispatch(string $uri,string $method):void
    {
        $route = $this->findRoute($uri,$method);
        if (!$route){
            $this->notFound();
        }
        if(is_array($route->getAction())){
           [$controller,$action] = $route->getAction();
           $controller = new $controller();
           $controller->$action();
        }
        else{
            $route->getAction()();
        }
    }
    private function notFound():void
    {
        echo '404';
        exit;
    }
    private function initRoutes():void
    {
        $routes = $this->getRoutes();
        foreach ($routes as $route){
            $this->routes[$route->getMethod()][$route->getUri()] = $route;
        }
    }
    private function findRoute(string $uri,string $method):Route|false
    {
        if (!isset($this->routes[$method][$uri])){
            return false;
        }
        return $this->routes[$method][$uri];
    }
    /**
     * @return Route[]
     */
    private function getRoutes()
    {
        return require APP_PATH . '/config/routes.php';
    }
}
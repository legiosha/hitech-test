<?php
namespace App;

class Router
{
    protected $routes = [];

    private function addRoute($route, $controller, $action, $method)
    {
        $this->routes[$method][$route] = ['controller' => $controller, 'action' => $action];
    }

    public function get($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "GET");
    }

    public function post($route, $controller, $action)
    {
        $this->addRoute($route, $controller, $action, "POST");
    }

    public function dispatch()
    {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $method = $_SERVER['REQUEST_METHOD'];
        $data = $this->getRequestData();

        if (array_key_exists($uri, $this->routes[$method])) {
            $controller = $this->routes[$method][$uri]['controller'];
            $action = $this->routes[$method][$uri]['action'];

            $controller = new $controller();
            $controller->$action($data);
        } else {
//             throw new Exception("No route found for URI: $uri");
            echo "404 Ошибка! По этому адресу ничего не находится: $uri";
        }
    }

    public function getRequestData() {
        switch($_SERVER['REQUEST_METHOD'])
        {
            case 'GET': return $_GET;
            case 'POST': return $_POST;
            default: return null;
        }
    }
}

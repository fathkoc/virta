<?php

class Router {
    private $routes = [];

    public function get($uri, $action) {
        $this->addRoute('GET', $uri, $action);
    }

    public function post($uri, $action) {
        $this->addRoute('POST', $uri, $action);
    }

    private function addRoute($method, $uri, $action) {
        $this->routes[] = [
            'method' => $method,
            'uri' => $this->parseUri($uri),
            'action' => $action
        ];
    }

    public function handle($uri) {
        $uri = trim($uri, '/');
        $method = $_SERVER['REQUEST_METHOD'];
    

        foreach ($this->routes as $route) {
            if ($method == $route['method'] && preg_match($route['uri'], $uri, $matches)) {
                array_shift($matches); // İlk eşleşmeyi çıkar
                return $this->dispatch($route['action'], $matches);
            }
        }

        echo "404 - Bulunamadı";
    }

    private function dispatch($action, $params) {
        list($controller, $method) = explode('@', $action);
        $controller = 'App\\Controllers\\' . $controller;
        $instance = new $controller;
        call_user_func_array([$instance, $method], $params);
    }

    private function parseUri($uri) {
        // URI desenlerini regex ile değiştir
        $uri = preg_replace('/{(\w+?)}/', '([^/]+)', $uri); // dinamik parametreler
        $uri = preg_replace('/{(\w+?)\?}/', '([^/]*)', $uri); // opsiyonel parametreler
        return "/^" . str_replace('/', '\/', trim($uri, '/')) . "$/";
    }
}

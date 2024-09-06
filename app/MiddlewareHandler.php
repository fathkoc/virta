<?php

class MiddlewareHandler {
    private $middlewares = [];

    // Middleware ekle
    public function add($uri, $middleware) {
        // Bir URI için birden fazla middleware ekleyebilmek için her URI'yı bir dizi olarak saklıyoruz
        if (!isset($this->middlewares[$uri])) {
            $this->middlewares[$uri] = [];
        }
        $this->middlewares[$uri][] = $middleware;
    }

    
    public function handle($uri) {
        foreach ($this->middlewares as $route => $middlewares) {
            if (preg_match($this->parseUri($route), trim($uri, '/'))) {
                foreach ($middlewares as $middleware) {
                    $middlewareInstance = new $middleware();
                    if (!$middlewareInstance->handle()) {
                        echo "Middleware'den geçiş başarısız!";
                        exit;
                    }
                }
            }
        }
        return true; 
    }

    
    private function parseUri($uri) {
        // Dinamik parametreler için {param} şeklinde yazılanları regex'e çevir
        $uri = preg_replace('/{(\w+?)}/', '([^/]+)', $uri);
        // Opsiyonel parametreler için {param?} şeklinde yazılanları regex'e çevir
        $uri = preg_replace('/{(\w+?)\?}/', '([^/]*)', $uri);
        // URI'yi regex ile eşleşecek hale getir
        return "/^" . str_replace('/', '\/', trim($uri, '/')) . "$/";
    }
}

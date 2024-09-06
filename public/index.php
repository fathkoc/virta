<?php

require_once '../routes/web.php';
require_once '../app/Router.php';
require_once '../app/MiddlewareHandler.php';
die('fatik');

$uri = $_SERVER['REQUEST_URI'];


$middlewareHandler = new MiddlewareHandler();


$middlewareHandler->add('/user/{id}', 'App\Middleware\AuthMiddleware');

if ($middlewareHandler->handle($uri)) {
    $router = new Router();
    $router->handle($uri);
}
<?php

$router = new Router();

//parameter routıng
$router->get('/user/{id}', 'UserController@show');
$router->get('/user/{id}/blog/{postId}', 'UserController@showPost');
$router->get('/user/{id?}', 'UserController@optionalUser');

// Regex routing
$router->get('/user/{\d+}', 'UserController@showWithRegex');

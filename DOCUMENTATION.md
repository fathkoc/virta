# Project Documentation

This document explains the structure and key components of the MVC PHP Routing & Middleware project.

## 1. Routing System

The routing system supports dynamic parameters, optional parameters, and regex patterns for handling HTTP requests. All route definitions are done in the `/routes/web.php` file.

### Example Route Definitions:

```php
// Dynamic parameters
$router->get('/user/{id}', 'UserController@show');

// Optional parameters
$router->get('/user/{id?}', 'UserController@optionalUser');

// Regex-based routing
$router->get('/user/{\d+}', 'UserController@showWithRegex');

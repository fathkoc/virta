
---

### **DOCUMENTATION.md** (Türkçe)

```md
# Proje Dokümantasyonu

Bu doküman, MVC PHP Routing ve Middleware projesinin yapısını ve ana bileşenlerini açıklar.

## 1. Routing Sistemi

Routing sistemi dinamik parametreleri, opsiyonel parametreleri ve regex desenlerini destekler. Tüm route tanımlamaları `/routes/web.php` dosyasında yapılır.

### Örnek Route Tanımları:

```php
// Dinamik parametreler
$router->get('/user/{id}', 'UserController@show');

// Opsiyonel parametreler
$router->get('/user/{id?}', 'UserController@optionalUser');

// Regex tabanlı routing
$router->get('/user/{\d+}', 'UserController@showWithRegex');

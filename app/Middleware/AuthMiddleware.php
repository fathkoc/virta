<?php

namespace App\Middleware;

class AuthMiddleware {
    public function handle() {
        // Örneğin, kullanıcı oturumu yoksa engelle
        if (!isset($_SESSION['user'])) {
            echo "Yetkisiz erişim.";
            exit; // Controller çalıştırılmadan önce durdur
        }
        return true;
    }
}

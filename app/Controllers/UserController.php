<?php

namespace App\Controllers;

use App\Models\DB;

require_once '../app/Controllers/BaseController.php'; 

class UserController extends BaseController {
    
    // User ID'ye göre view döndüren metot
    public function show($id) {
        return $this->response($this->view('user.php', ['user_id' => $id]));
    }

    // Kullanıcı postunu gösteren metot
    public function showPost($id, $postId) {
        // Echo yerine response metodunu kullanarak metni döndürüyoruz
        return $this->response("Kullanıcı $id'nin yazısı: $postId");
    }

    // Opsiyonel parametreye göre içerik döndüren metot
    public function optionalUser($id = null) {
        if ($id) {
            return $this->response("Kullanıcı ID: $id");
        } else {
            return $this->response("Varsayılan kullanıcı sayfası");
        }
    }

    // Regex ile sayısal ID kontrolü yapan metot
    public function showWithRegex($id) {
        return $this->response("Sayısal ID'li kullanıcı: $id");
    }

    // JSON formatında yanıt döndüren metot
    public function getJsonResponse() {
        // Array olarak JSON yanıt döndürüyoruz
        return $this->response([
            'username' => 'Fatih',
            'id' => 1
        ]);
    }

    // Düz metin yanıtı döndüren metot
    public function plainTextResponse() {
        return $this->response("Bu bir düz metin yanıtıdır.");
    }

    // Veritabanındaki kullanıcıları döndüren metot
    public function getUsers() {
        // Veritabanına bağlanıyoruz
        DB::connect();

        // Kullanıcıları sorguluyoruz
        $users = DB::query('SELECT * FROM users');

        // Eğer kullanıcılar yoksa mesaj döndürüyoruz
        if (empty($users)) {
            return $this->response(['message' => 'Kullanıcı bulunamadı.']);
        }

        // JSON olarak kullanıcıları döndürüyoruz
        return $this->response($users);
    }
}

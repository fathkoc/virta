<?php

namespace App\Models;

use PDO;
use PDOException;

class DB {
    private static $pdo;

    public static function connect() {
      
        $config = require dirname(__DIR__, 2) . '/config/config.php';

        if (!self::$pdo) {
            try {
                self::$pdo = new PDO("mysql:host=" . $config['db_host'] . ";dbname=" . $config['db_name'] . ";charset=utf8mb4", $config['db_user'], $config['db_pass']);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Veritabanı bağlantı hatası: " . $e->getMessage());
            }
        }

        return self::$pdo;
    }

  
    public static function query($sql, $params = []) {
    
        if (!self::$pdo) {
            self::connect();
        }

        $stmt = self::$pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

 
    public static function beginTransaction() {
        self::$pdo->beginTransaction();
    }

    public static function commit() {
        self::$pdo->commit();
    }

    public static function rollBack() {
        self::$pdo->rollBack();
    }
}

<?php
namespace App\Models;

class BaseModel {
    protected $pdo;

    public function __construct() {
        $host = "localhost";
        $dbname = "buoi2_php";
        $username = "root";
        $password = "";

        try {
            $this->pdo = new \PDO(
                "mysql:host=$host;dbname=$dbname;charset=utf8",
                $username,
                $password
            );

            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("Hệ thống đang bảo trì: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}

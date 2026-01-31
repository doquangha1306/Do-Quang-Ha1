<?php
namespace App\Models;

class BaseModel {
    protected $conn;

    public function __construct() {
        $host = "localhost";
        $dbname = "buoi2_php";
        $username = "root";
        $password = "";

        try {
            $this->conn = new \PDO(
                "mysql:host=$host;dbname=$dbname;charset=utf8",
                $username,
                $password
            );

            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("Hệ thống đang bảo trì: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}

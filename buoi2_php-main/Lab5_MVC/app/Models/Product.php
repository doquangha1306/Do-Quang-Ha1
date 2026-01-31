<?php
namespace App\Models;

class Product extends BaseModel {
    public function __construct() {
        parent::__construct();
    }

    /**
     * Lấy tất cả sản phẩm từ database
     * @return array
     */
    public function getAllProducts() {
        $sql = "SELECT * FROM products ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Lấy một sản phẩm theo ID
     * @param int $id
     * @return array
     */
    public function getProductById($id) {
        $sql = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Thêm sản phẩm mới
     * @param array $data
     * @return bool
     */
    public function addProduct($data) {
        $sql = "INSERT INTO products (name, price, description, quantity)
                VALUES (:name, :price, :description, :quantity)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':name' => $data['name'],
            ':price' => $data['price'],
            ':description' => $data['description'],
            ':quantity' => $data['quantity']
        ]);
    }
}

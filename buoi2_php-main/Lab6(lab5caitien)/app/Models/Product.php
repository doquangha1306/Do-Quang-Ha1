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
    public function all() {
        $sql = "SELECT * FROM products ORDER BY id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Lấy một sản phẩm theo ID
     * @param int $id
     * @return array
     */
    public function find($id) {
        $sql = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Thêm sản phẩm mới
     * @param array $data
     * @return bool
     */
    public function insert($data) {
        $sql = "INSERT INTO products (name, price, description, quantity, image)
                VALUES (:name, :price, :description, :quantity, :image)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':name' => $data['name'],
            ':price' => $data['price'],
            ':description' => $data['description'],
            ':quantity' => $data['quantity'],
            ':image' => $data['image']
        ]);
    }

    /**
     * Cập nhật sản phẩm
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update($id, $data) {
        $sql = "UPDATE products
                SET name = :name,
                    price = :price,
                    description = :description,
                    quantity = :quantity,
                    image = :image
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':name' => $data['name'],
            ':price' => $data['price'],
            ':description' => $data['description'],
            ':quantity' => $data['quantity'],
            ':image' => $data['image'],
            ':id' => $id
        ]);
    }

    /**
     * Xóa sản phẩm
     * @param int $id
     * @return bool
     */
    public function delete($id) {
        $sql = "DELETE FROM products WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}

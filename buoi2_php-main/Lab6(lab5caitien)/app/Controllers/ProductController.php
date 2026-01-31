<?php
namespace App\Controllers;

use App\Models\Product;

class ProductController {
    public function index() {
        $productModel = new Product();
        $products = $productModel->all();
        include 'views/product_list.php';
    }

    public function show($id) {
        $productModel = new Product();
        $product = $productModel->find($id);

        if (!$product) {
            echo "404 - Sản phẩm không tồn tại";
            return;
        }

        include 'views/product_detail.php';
    }

    public function create() {
        $errors = [];
        $old = [
            'name' => '',
            'price' => '',
            'description' => '',
            'quantity' => '',
            'image' => ''
        ];
        include 'views/product_add.php';
    }

    public function store() {
        $data = [
            'name' => trim($_POST['name'] ?? ''),
            'price' => trim($_POST['price'] ?? ''),
            'description' => trim($_POST['description'] ?? ''),
            'quantity' => trim($_POST['quantity'] ?? ''),
            'image' => trim($_POST['image'] ?? '')
        ];

        $errors = [];
        if ($data['name'] === '') {
            $errors[] = 'Tên sản phẩm không được để trống';
        }
        if ($data['price'] === '' || !is_numeric($data['price'])) {
            $errors[] = 'Giá sản phẩm không hợp lệ';
        }

        if (!empty($errors)) {
            $old = $data;
            include 'views/product_add.php';
            return;
        }

        $productModel = new Product();
        $productModel->insert($data);
        header("Location: index.php?page=product-list");
        exit;
    }

    public function edit($id) {
        $productModel = new Product();
        $product = $productModel->find($id);

        if (!$product) {
            echo "404 - Sản phẩm không tồn tại";
            return;
        }

        $errors = [];
        include 'views/product_edit.php';
    }

    public function update($id) {
        $productModel = new Product();
        $product = $productModel->find($id);

        if (!$product) {
            echo "404 - Sản phẩm không tồn tại";
            return;
        }

        $data = [
            'name' => trim($_POST['name'] ?? ''),
            'price' => trim($_POST['price'] ?? ''),
            'description' => trim($_POST['description'] ?? ''),
            'quantity' => trim($_POST['quantity'] ?? ''),
            'image' => trim($_POST['image'] ?? '')
        ];

        $errors = [];
        if ($data['name'] === '') {
            $errors[] = 'Tên sản phẩm không được để trống';
        }
        if ($data['price'] === '' || !is_numeric($data['price'])) {
            $errors[] = 'Giá sản phẩm không hợp lệ';
        }

        if (!empty($errors)) {
            $product = array_merge($product, $data);
            include 'views/product_edit.php';
            return;
        }

        $productModel->update($id, $data);
        header("Location: index.php?page=product-list");
        exit;
    }

    public function delete($id) {
        $productModel = new Product();
        $productModel->delete($id);
        header("Location: index.php?page=product-list");
        exit;
    }
}

<?php
namespace App\Controllers;

use App\Models\Product;

class ProductController {
    public function list() {
        // Tạo instance của ProductModel
        $productModel = new Product();

        // Lấy dữ liệu từ database
        $products = $productModel->getAllProducts();

        // Gọi View và truyền dữ liệu
        include 'views/product_list.php';
    }

    public function show($id) {
        $productModel = new Product();
        $product = $productModel->getProductById($id);

        if (!$product) {
            echo "404 - Sản phẩm không tồn tại";
            return;
        }

        include 'views/product_detail.php';
    }
}

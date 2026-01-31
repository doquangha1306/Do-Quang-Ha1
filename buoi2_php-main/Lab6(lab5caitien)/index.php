<?php
require 'vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\ProductController;
use App\Controllers\StudentController;

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;

    case 'product-list':
        $controller = new ProductController();
        $controller->index();
        break;

    case 'product-add':
        $controller = new ProductController();
        $controller->create();
        break;

    case 'product-store':
        $controller = new ProductController();
        $controller->store();
        break;

    case 'product-detail':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $controller = new ProductController();
            $controller->show($id);
        } else {
            echo "404 - Sản phẩm không tồn tại";
        }
        break;

    case 'product-edit':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $controller = new ProductController();
            $controller->edit($id);
        } else {
            echo "404 - Sản phẩm không tồn tại";
        }
        break;

    case 'product-update':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $controller = new ProductController();
            $controller->update($id);
        } else {
            echo "404 - Sản phẩm không tồn tại";
        }
        break;

    case 'product-delete':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $controller = new ProductController();
            $controller->delete($id);
        } else {
            echo "404 - Sản phẩm không tồn tại";
        }
        break;

    case 'students':
        $controller = new StudentController();
        $controller->list();
        break;

    case 'student_add':
        $controller = new StudentController();
        $controller->add();
        break;

    default:
        echo "404 - Page Not Found";
}
?>

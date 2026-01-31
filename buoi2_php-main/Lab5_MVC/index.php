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

    case 'products':
        $controller = new ProductController();
        $controller->list();
        break;

    case 'product':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $controller = new ProductController();
            $controller->show($id);
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

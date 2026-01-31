<?php
namespace App\Controllers;

use App\Models\Student;

class HomeController {
    public function index() {
        // Chuẩn bị dữ liệu
        $message = "Chào mừng đến với MVC!";
        $studentInfo = (new Student())->getInfo();

        // Gọi View
        include 'views/home.php';
    }
}

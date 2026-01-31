<?php
namespace App\Controllers;

use App\Models\Student;

class StudentController {
    public function list() {
        $studentModel = new Student();
        $students = $studentModel->getAllStudents();
        include 'views/student_list.php';
    }

    public function add() {
        $msg = '';
        
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $studentModel = new Student();
            $data = [
                'fullname' => $_POST['fullname'],
                'student_code' => $_POST['student_code'],
                'email' => $_POST['email']
            ];
            
            if ($studentModel->addStudent($data)) {
                $msg = "Thêm sinh viên thành công!";
            }
        }
        
        include 'views/student_add.php';
    }
}

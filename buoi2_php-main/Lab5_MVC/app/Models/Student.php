<?php
namespace App\Models;

class Student extends BaseModel {
    public function __construct() {
        parent::__construct();
    }

    /**
     * Lấy thông tin sinh viên
     * @return string
     */
    public function getInfo() {
        return "Đây là thông tin từ Model Student";
    }

    /**
     * Lấy tất cả sinh viên
     * @return array
     */
    public function getAllStudents() {
        $sql = "SELECT * FROM students ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Thêm sinh viên mới
     * @param array $data
     * @return bool
     */
    public function addStudent($data) {
        $sql = "INSERT INTO students (fullname, student_code, email)
                VALUES (:fullname, :student_code, :email)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':fullname' => $data['fullname'],
            ':student_code' => $data['student_code'],
            ':email' => $data['email']
        ]);
    }
}
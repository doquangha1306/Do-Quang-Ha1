<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thêm sinh viên</title>
</head>
<body>

<h2>Thêm sinh viên</h2>

<form method="POST">
    <input type="text" name="fullname" placeholder="Họ tên" required><br><br>
    <input type="text" name="student_code" placeholder="Mã sinh viên" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <button type="submit">Thêm mới</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include "db_connect.php";

    $fullname = $_POST['fullname'];
    $student_code = $_POST['student_code'];
    $email = $_POST['email'];

    $sql = "INSERT INTO students (fullname, student_code, email)
            VALUES (:fullname, :student_code, :email)";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':fullname' => $fullname,
        ':student_code' => $student_code,
        ':email' => $email
    ]);

    echo "<p style='color:green'>Thêm sinh viên thành công!</p>";
}
?>
</body>
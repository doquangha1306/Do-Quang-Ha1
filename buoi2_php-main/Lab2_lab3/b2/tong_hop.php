<?php
include "db_connect.php";

/* ===== XỬ LÝ THÊM SINH VIÊN ===== */
if (isset($_POST['add_student'])) {
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

    $msg = "Thêm sinh viên thành công!";
}

/* ===== LẤY DANH SÁCH SINH VIÊN ===== */
$sql = "SELECT * FROM students";
$stmt = $conn->prepare($sql);
$stmt->execute();
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>LAB 2 – PHP MySQL</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background: #f2f2f2; }
        hr { margin: 30px 0; }
    </style>
</head>
<body>

<h1>LAB 2 – PHP & MySQL</h1>

<!-- ===== BÀI 1: FORM GET ===== -->
<h2>1. Form GET (Tìm kiếm)</h2>
<form method="GET">
    <input type="text" name="keyword" placeholder="Nhập từ khóa">
    <button type="submit">Tìm</button>
</form>

<?php
if (isset($_GET['keyword'])) {
    echo "<p>Bạn đang tìm kiếm từ khóa: <b>" . htmlspecialchars($_GET['keyword']) . "</b></p>";
}
?>

<hr>

<!-- ===== BÀI 1: FORM POST ===== -->
<h2>2. Form POST (Đăng ký)</h2>
<form method="POST">
    <input type="text" name="name" placeholder="Tên" required>
    <input type="password" name="password" placeholder="Mật khẩu" required>
    <button type="submit" name="register">Đăng ký</button>
</form>

<?php
if (isset($_POST['register'])) {
    echo "<p>Đã nhận thông tin của <b>" . htmlspecialchars($_POST['name']) . "</b></p>";
}
?>

<hr>

<!-- ===== BÀI 3: THÊM SINH VIÊN ===== -->
<h2>3. Thêm sinh viên</h2>

<?php if (!empty($msg)) echo "<p style='color:green'>$msg</p>"; ?>

<form method="POST">
    <input type="text" name="fullname" placeholder="Họ tên" required>
    <input type="text" name="student_code" placeholder="Mã SV" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit" name="add_student">Thêm mới</button>
</form>

<hr>

<!-- ===== BÀI 4: DANH SÁCH SINH VIÊN ===== -->
<h2>4. Danh sách sinh viên</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Họ tên</th>
        <th>Mã SV</th>
        <th>Email</th>
        <th>Hành động</th>
    </tr>

    <?php foreach ($students as $sv): ?>
    <tr>
        <td><?= $sv['id'] ?></td>
        <td><?= htmlspecialchars($sv['fullname']) ?></td>
        <td><?= htmlspecialchars($sv['student_code']) ?></td>
        <td><?= htmlspecialchars($sv['email']) ?></td>
        <td>
            <a href="#">Sửa</a> |
            <a href="#">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>

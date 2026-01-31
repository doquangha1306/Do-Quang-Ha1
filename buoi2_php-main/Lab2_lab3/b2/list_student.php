<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Danh sách sinh viên</h2>

<?php
include "db_connect.php";

$sql = "SELECT * FROM students";
$stmt = $conn->prepare($sql);
$stmt->execute();

$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

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

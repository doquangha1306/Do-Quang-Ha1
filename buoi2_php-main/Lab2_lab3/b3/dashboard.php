<?php
session_start();

// Nếu chưa đăng nhập → đá về login
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>

<h2>Trang quản trị</h2>

<p>Xin chào, <b><?= htmlspecialchars($_SESSION['user']) ?></b></p>

<a href="logout.php">Đăng xuất</a>

</body>
</html>

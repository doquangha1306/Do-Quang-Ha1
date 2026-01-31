<?php
session_start(); // PHẢI ở dòng đầu tiên

include "../b2/db_connect.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password_input = $_POST['password'];

    // Tìm user theo email
    $sql = "SELECT * FROM students WHERE email = :email LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':email' => $email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // So sánh mật khẩu
        if (password_verify($password_input, $user['password'])) {
            $_SESSION['user'] = $user['email'];

            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Sai email hoặc mật khẩu";
        }
    } else {
        $error = "Sai email hoặc mật khẩu";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
</head>
<body>

<h2>Đăng nhập</h2>

<?php if ($error): ?>
    <p style="color:red"><?= $error ?></p>
<?php endif; ?>

<form method="POST">
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Mật khẩu" required><br><br>
    <button type="submit">Đăng nhập</button>
</form>

<p><a href="register.php">Chưa có tài khoản? Đăng ký</a></p>

</body>
</html>

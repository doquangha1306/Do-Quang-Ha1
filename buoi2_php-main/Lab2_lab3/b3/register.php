<?php
include "../b2/db_connect.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Mã hóa mật khẩu
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
                                                                            
    // Lưu vào DB
    $sql = "INSERT INTO students (email, password)
            VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':email' => $email,
        ':password' => $password_hash
    ]);

    $message = "Đăng ký thành công! Bạn có thể đăng nhập.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
</head>
<body>

<h2>Đăng ký tài khoản</h2>

<?php if ($message): ?>
    <p style="color:green"><?= $message ?></p>
<?php endif; ?>

<form method="POST">
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Mật khẩu" required><br><br>
    <button type="submit">Đăng ký</button>
</form>

<p><a href="login.php">Đăng nhập</a></p>

</body>
</html>

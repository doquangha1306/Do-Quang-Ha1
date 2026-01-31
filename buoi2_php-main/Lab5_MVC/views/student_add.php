<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thêm sinh viên</title>
</head>
<body>
    <h2>Thêm sinh viên</h2>

    <?php if (!empty($msg)): ?>
        <p><?= $msg ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="fullname" placeholder="Họ tên" required>
        <input type="text" name="student_code" placeholder="Mã sinh viên" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit">Thêm mới</button>
    </form>

    <a href="?page=students">← Quay lại danh sách</a>
    <a href="?page=home">← Quay lại Home</a>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
</head>
<body>
    <h2>Danh sách sinh viên</h2>
    
    <a href="?page=student_add">➕ Thêm sinh viên</a>
    <a href="?page=home">← Quay lại Home</a>

    <?php if (!empty($students)): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Mã SV</th>
                <th>Email</th>
            </tr>
            <?php foreach ($students as $sv): ?>
            <tr>
                <td><?= $sv['id'] ?></td>
                <td><?= htmlspecialchars($sv['fullname']) ?></td>
                <td><?= htmlspecialchars($sv['student_code']) ?></td>
                <td><?= htmlspecialchars($sv['email']) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Chưa có sinh viên nào. <a href="?page=student_add">Thêm mới</a></p>
    <?php endif; ?>
</body>
</html>

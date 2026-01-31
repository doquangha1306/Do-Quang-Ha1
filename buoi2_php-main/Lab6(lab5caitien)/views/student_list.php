<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Danh sách sinh viên</h2>
            <div>
                <a class="btn btn-outline-secondary" href="?page=home">← Quay lại Home</a>
                <a class="btn btn-primary" href="?page=student_add">➕ Thêm sinh viên</a>
            </div>
        </div>

        <?php if (!empty($students)): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Họ tên</th>
                            <th>Mã SV</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $sv): ?>
                        <tr>
                            <td><?= $sv['id'] ?></td>
                            <td><?= htmlspecialchars($sv['fullname']) ?></td>
                            <td><?= htmlspecialchars($sv['student_code']) ?></td>
                            <td><?= htmlspecialchars($sv['email']) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-info">Chưa có sinh viên nào. <a href="?page=student_add">Thêm mới</a></div>
        <?php endif; ?>
    </div>
</body>
</html>

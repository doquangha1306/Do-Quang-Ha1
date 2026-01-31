<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Danh sách sản phẩm</h2>
            <div>
                <a class="btn btn-outline-secondary" href="?page=home">← Quay lại Home</a>
                <a class="btn btn-primary" href="?page=product-add">+ Thêm sản phẩm</a>
            </div>
        </div>

        <?php if (!empty($products)): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Giá</th>
                            <th>Hình ảnh</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= $product['id'] ?></td>
                            <td>
                                <a href="?page=product-detail&id=<?= $product['id'] ?>">
                                    <?= htmlspecialchars($product['name']) ?>
                                </a>
                            </td>
                            <td><?= number_format($product['price'], 0, ',', '.') ?> đ</td>
                            <td>
                                <?php if (!empty($product['image'])): ?>
                                    <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" style="width: 80px; height: 60px; object-fit: cover;">
                                <?php else: ?>
                                    <span class="text-muted">Không có</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="?page=product-edit&id=<?= $product['id'] ?>">Sửa</a>
                                <a class="btn btn-sm btn-danger" href="?page=product-delete&id=<?= $product['id'] ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="alert alert-info">Không có sản phẩm nào</div>
        <?php endif; ?>
    </div>
</body>
</html>

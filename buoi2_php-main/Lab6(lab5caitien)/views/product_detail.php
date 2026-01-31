<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Chi tiết sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Chi tiết sản phẩm</h2>
            <div>
                <a class="btn btn-outline-secondary" href="?page=product-list">← Danh sách</a>
                <a class="btn btn-warning" href="?page=product-edit&id=<?= $product['id'] ?>">Sửa</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <?php if (!empty($product['image'])): ?>
                            <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="img-fluid rounded">
                        <?php else: ?>
                            <div class="text-muted">Không có hình ảnh</div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-8">
                        <h4><?= htmlspecialchars($product['name']) ?></h4>
                        <p class="mb-1"><strong>Giá:</strong> <?= number_format($product['price'], 0, ',', '.') ?> đ</p>
                        <p class="mb-1"><strong>Số lượng:</strong> <?= htmlspecialchars($product['quantity'] ?? '') ?></p>
                        <p class="mb-0"><strong>Mô tả:</strong> <?= htmlspecialchars($product['description'] ?? '') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

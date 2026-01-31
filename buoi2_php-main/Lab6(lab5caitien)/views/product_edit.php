<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Cập nhật sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="mb-0">Cập nhật sản phẩm</h2>
            <a class="btn btn-outline-secondary" href="?page=product-list">← Danh sách</a>
        </div>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="?page=product-update&id=<?= $product['id'] ?>" class="card p-3">
            <div class="mb-3">
                <label class="form-label">Tên sản phẩm</label>
                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($product['name'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Giá</label>
                <input type="text" name="price" class="form-control" value="<?= htmlspecialchars($product['price'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Mô tả</label>
                <textarea name="description" class="form-control" rows="3"><?= htmlspecialchars($product['description'] ?? '') ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Số lượng</label>
                <input type="number" name="quantity" class="form-control" value="<?= htmlspecialchars($product['quantity'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Hình ảnh (URL)</label>
                <input type="text" name="image" class="form-control" value="<?= htmlspecialchars($product['image'] ?? '') ?>">
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
</body>
</html>

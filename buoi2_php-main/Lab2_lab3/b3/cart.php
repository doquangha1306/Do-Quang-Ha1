<?php
session_start();

/* ===== DANH SÁCH SẢN PHẨM (GIẢ LẬP) ===== */
$products = [
    1 => "Áo thun",
    2 => "Quần jean",
    3 => "Giày thể thao"
];

/* ===== KHỞI TẠO GIỎ HÀNG ===== */
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

/* ===== XỬ LÝ THÊM VÀO GIỎ ===== */
if (isset($_GET['add'])) {
    $product_id = $_GET['add'];
    $_SESSION['cart'][] = $product_id;
    header("Location: cart.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng</title>
</head>
<body>

<h2>Danh sách sản phẩm</h2>

<ul>
    <?php foreach ($products as $id => $name): ?>
        <li>
            <?= $name ?>
            - <a href="cart.php?add=<?= $id ?>">Thêm vào giỏ</a>
        </li>
    <?php endforeach; ?>
</ul>

<hr>

<h2>Giỏ hàng của bạn</h2>

<?php if (empty($_SESSION['cart'])): ?>
    <p>Giỏ hàng trống</p>
<?php else: ?>
    <ul>
        <?php foreach ($_SESSION['cart'] as $id): ?>
            <li><?= $products[$id] ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

</body>
</html>

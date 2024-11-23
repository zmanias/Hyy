<?php
// Simulasi data produk
$products = [
    1 => ['name' => 'Produk 1', 'price' => 10000],
    2 => ['name' => 'Produk 2', 'price' => 20000],
];

$id = $_GET['id'] ?? null;

if (!isset($products[$id])) {
    die('Produk tidak ditemukan.');
}

$product = $products[$id];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Detail Produk</h1>
    <p>Nama: <?= $product['name'] ?></p>
    <p>Harga: Rp<?= number_format($product['price'], 0, ',', '.') ?></p>
    <button id="payButton" data-price="<?= $product['price'] ?>">Bayar Sekarang</button>
    <script src="js/script.js"></script>
</body>
</html>
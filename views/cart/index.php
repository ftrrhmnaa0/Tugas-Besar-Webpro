<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang - Peukan Rumoh</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        .nav-main {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: green;
            color: white;
        }

        .logo img {
            height: 40px;
        }

        .search-bar {
            width: 60%;
            margin: 0 20px;
        }

        .search-bar form {
            display: flex;
        }

        .search-bar input[type="text"] {
            flex: 1;
            padding: 5px 10px;
            border: none;
            border-radius: 5px 0 0 5px;
        }

        .search-bar button {
            padding: 5px 15px;
            border: none;
            background-color: #ff6f00;
            color: white;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }

        .cart-container {
            max-width: 1000px;
            margin: 2rem auto;
        }

        .cart-card {
            background: #fff;
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .store-name {
            font-weight: bold;
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }

        .cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem;
            border-bottom: 1px solid #eee;
            padding-bottom: 1rem;
        }

        .cart-item img {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            margin-right: 1rem;
        }

        .item-info {
            flex: 1;
        }

        .item-info h4 {
            margin: 0;
        }

        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 5px;
        }

        .quantity-controls button {
            padding: 4px 10px;
            font-size: 1rem;
            border: none;
            background-color: #ddd;
            cursor: pointer;
            border-radius: 5px;
        }

        .quantity-controls input[type="number"] {
            width: 50px;
            text-align: center;
            font-size: 1rem;
            padding: 3px;
        }

        .item-actions {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 5px;
        }

        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .btn-danger {
            background-color: #e74c3c;
            color: white;
        }

        .btn-checkout {
            background-color: #27ae60;
            color: white;
        }

        .btn-checkout-store {
            margin-top: 1rem;
            float: right;
        }
    </style>
</head>
<body>

    <nav>
        <div class="nav-main">
            <div class="logo">
                <a href="index.php">
                    <img src="/Tubes_Webpro/assets/images/logoMaster2.png" alt="Logo">
                </a>
            </div>
            <div class="search-bar">
                <form action="index.php?c=product&a=search" method="GET">
                    <input type="text" name="query" placeholder="Cari Produk..." required>
                    <button type="submit">Cari</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="cart-container">
        <?php if (empty($cart)): ?>
            <p>Keranjang kamu kosong.</p>
        <?php else: ?>
            <?php foreach ($cart as $store): ?>
                <div class="cart-card">
                    <div class="store-name"><?= htmlspecialchars($store['store_name']) ?></div>
                    <?php foreach ($store['items'] as $item): ?>
                        <div class="cart-item">
                            <img src="assets/images/products/<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['product_name']) ?>">
                            <div class="item-info">
                                <h4><?= htmlspecialchars($item['product_name']) ?></h4>
                                <div class="quantity-controls">
                                    <form method="post" action="index.php?c=cart&a=updateQuantity" style="display:inline;">
                                        <input type="hidden" name="id_produk" value="<?= $item['id'] ?>">
                                        <input type="hidden" name="action" value="decrease">
                                        <button type="submit">−</button>
                                    </form>
                                    <input type="number" value="<?= $item['quantity'] ?>" readonly>
                                    <form method="post" action="index.php?c=cart&a=updateQuantity" style="display:inline;">
                                        <input type="hidden" name="id_produk" value="<?= $item['id'] ?>">
                                        <input type="hidden" name="action" value="increase">
                                        <button type="submit">+</button>
                                    </form>
                                </div>
                            </div>
                            <div class="item-actions">
                                <!-- Tombol hapus -->
                                <form method="post" action="index.php?c=cart&a=remove" onsubmit="return confirm('Hapus item ini dari keranjang?');">
                                    <input type="hidden" name="id_produk" value="<?= $item['id'] ?>">
                                    <button type="submit" class="btn btn-danger">🗑️ Hapus</button>
                                </form>
                                <!-- Tombol checkout per barang -->
                                <form method="post" action="index.php?c=checkout&a=single">
                                    <input type="hidden" name="id_produk" value="<?= $item['id'] ?>">
                                    <input type="hidden" name="quantity" value="<?= $item['quantity'] ?>">
                                    <button type="submit" class="btn btn-checkout">💳 Checkout Barang Ini</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- Tombol checkout per toko -->
                    <form method="post" action="index.php?c=checkout&a=store">
                        <input type="hidden" name="store_name" value="<?= htmlspecialchars($store['store_name']) ?>">
                        <button type="submit" class="btn btn-checkout btn-checkout-store">💳 Checkout Toko Ini</button>
                    </form>
                    <div style="clear: both;"></div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

</body>
</html>

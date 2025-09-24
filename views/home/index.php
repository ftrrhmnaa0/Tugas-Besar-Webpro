<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Peukan Rumoh</title>
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="icon" href="assets/images/logoMaster.png" type="image/x-icon">
</head>
<body>
    <!-- Navbar -->
    <nav>
        <div class="nav-top">
            <div class="welcome-message">
                <span>Selamat Datang di <b>Peukan Rumoh</b></span>
            </div>
            <div class="link-top">
                <ul>
                    <li><a href="index.php?c=sellerauth&a=login">Bergabung Dengan Kami</a></li>
                    <li><a href="#">Pusat Bantuan</a></li>
                </ul>
            </div>
        </div>
        <div class="nav-main">
            <div class="logo">
                <a href="index.php">
                    <img src="assets/images/logoMaster2.png" alt="Logo Peukan Rumoh">
                </a>
            </div>
            <div class="search-bar">
                <form action="search.php" method="GET">
                    <input type="text" name="query" placeholder="Cari Produk..." required>
                    <button type="submit">Cari</button>
                </form>
            </div>
            <div class="bucket-wishlist">
                <div class="wishlist">
                    <a href="wishlist.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#f4f4f4" class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                        </svg>
                        <span>Wishlist</span>
                        <span class="wishlist-count">0</span>
                    </a>
                </div>
                <div class="bucket">
                    <a href="index.php?c=cart">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#f4f4f4" class="bi bi-cart-fill" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                        </svg>
                        <span>Keranjang</span>
                        <span class="cart-count">0</span>
                    </a>
                </div>
            </div>
            <div class="account">
                <?php if (isset($_SESSION['user'])): ?>
                    <div class="profile">
                        <a href="index.php?c=profile">
                            <span class="profileName">
                                <?= htmlspecialchars($_SESSION['user']['nama']) ?>
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#f4f4f4" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg>
                        </a>
                    </div>
                <?php else: ?>
                    <div class="sign-up">
                        <a href="index.php?c=auth&a=register">
                            <span class="signUp">Daftar</span>
                        </a>
                    </div>
                    <div class="sign-in">
                        <a href="index.php?c=auth&a=login">
                            <span class="signIn">Masuk</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#f4f4f4" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="nav-bottom">
            <div class="nav-categories">
                <ul>
                    <li><a href="#">Buah-Buahan</a></li>
                    <li><a href="#">Sayuran</a></li>
                    <li><a href="#">Daging</a></li>
                    <li><a href="#">Ikan</a></li>
                    <li><a href="#">Sembako</a></li>
                    <li><a href="#">Bumbu Dapur</a></li>
                    <li><a href="#">Peralatan Dapur</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Banner -->
    <div class="header">
        <div class="header-content">
            <div class="banner-promotion">
                <div class="banner-left">
                    <a href="#"><img src="assets/images/banner.jpg" alt="Promo Utama"></a>
                </div>
                <div class="banner-right">
                    <a href="#"><img src="assets/images/banner.jpg" alt="Promo 2"></a>
                    <a href="#"><img src="assets/images/banner.jpg" alt="Promo 3"></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Kategori -->
    <div class="category-section">
        <h2>Kategori Produk</h2>
        <div class="category-cards">
            <a class="category-card" href="category.php?cat=buah">
                <img src="assets/images/buahCategory.jpeg" alt="Buah">
                <h3>Buah-buahan</h3>
            </a>
            <a class="category-card" href="category.php?cat=sayur">
                <img src="assets/images/sayurCategory.jpg" alt="Sayur">
                <h3>Sayur-sayuran</h3>
            </a>
            <a class="category-card" href="category.php?cat=daging">
                <img src="assets/images/dagingCategory.jpg" alt="Daging">
                <h3>Daging</h3>
            </a>
            <a class="category-card" href="category.php?cat=sembako">
                <img src="assets/images/sembakoCategory.jpg" alt="Sembako">
                <h3>Sembako</h3>
            </a>
        </div>
    </div>

    <!-- Produk Terbaru -->
    <div class="product">
        <h2 style="text-align:center; margin-top:30px;">Produk Terbaru</h2>
        <div class="product-list">
            <?php if (!empty($produk)): ?>
                <?php foreach ($produk as $item): ?>
                    <a href="product.php?id=<?= $item['id_produk'] ?>" class="product-card">
                        <img src="assets/images/products/<?= htmlspecialchars($item['gambar'] ?? 'default.jpg') ?>" alt="<?= htmlspecialchars($item['nama_produk']) ?>">
                        <div class="card-body">
                            <h4><?= htmlspecialchars($item['nama_produk']) ?></h4>
                            <div class="product-rating" style="margin-bottom:6px;">
                                <?php
                                // Tampilkan bintang rating (maks 5)
                                $rating = isset($item['rating']) ? round($item['rating']) : 0;
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $rating) {
                                        echo '<span style="color:#FFD700;">&#9733;</span>'; // bintang isi
                                    } else {
                                        echo '<span style="color:#ccc;">&#9733;</span>'; // bintang kosong
                                    }
                                }
                                ?>
                                <span style="font-size:13px;color:#666;">
                                    <?= number_format($item['rating'] ?? 0, 1) ?>
                                </span>
                            </div>
                            <p>Rp <?= number_format($item['harga'], 0, ',', '.') ?></p>
                            <div style="display:flex; flex-direction:column; gap:8px;">
                                <button class="btn-detail" onclick="window.location.href='product.php?id=<?= $item['id_produk'] ?>'">Lihat Detail</button>
                                <form action="index.php?c=cart&a=add" method="POST" style="margin:0;">
                                    <input type="hidden" name="id_produk" value="<?= $item['id_produk'] ?>">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn-detail" style="background:#ff9800;">+ Keranjang</button>
                                </form>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="text-align:center;">Belum ada produk.</p>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section footer-links">
                <h4>Tentang</h4>
                <ul>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Kebijakan Privasi</a></li>
                    <li><a href="#">Syarat & Ketentuan</a></li>
                    <li><a href="#">Bantuan</a></li>
                </ul>
            </div>
            <div class="footer-section footer-socials">
                <h4>Ikuti Kami</h4>
                <ul>
                    <li>
                        <a href="#"><img src="assets/images/facebook.png" alt="Facebook"></a>
                    </li>
                    <li>
                        <a href="#"><img src="assets/images/twitter.png" alt="Twitter"></a>
                    </li>
                    <li>
                        <a href="#"><img src="assets/images/instagram.png" alt="Instagram"></a>
                    </li>
                </ul>
            </div>
            <div class="footer-section footer-copyright">
                <p>&copy; <?= date('Y') ?> Peukan Rumoh. Semua Hak Dilindungi.</p>
            </div>
        </div>
    </footer>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Akun Saya - Peukan Rumoh</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
        }

        html, body {
            width: 100%;
            height: 100%;
            overflow-x: hidden;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica', Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Container */
        .container {
            max-width: 100%;
            min-height: 100vh;
            background: #f0f0f0;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            padding: 0;
            color: white;
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            padding-top: 20px;
        }

        .header-title {
            font-size: 18px;
            font-weight: 500;
        }

        .header-actions {
            display: flex;
            gap: 10px;
        }

        .btn-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        /* Tambahkan di bagian <style> */
        .btn-icon.logout-btn {
            background: #ff4757;
            color: #fff;
            padding: 0 16px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            font-weight: 500;
            transition: background 0.2s;
            border: none;
            height: 36px;
            box-shadow: 0 2px 8px rgba(255,71,87,0.08);
        }
        .btn-icon.logout-btn:hover {
            background: #e84118;
            color: #fff;
            text-decoration: none;
        }
        .logout-label {
            margin-left: 6px;
        }

        /* Profile Info */
        .profile-info {
            padding: 15px;
            padding-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .profile-avatar {
            width: 60px;
            height: 60px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: bold;
            color: #10B981;
            border: 3px solid rgba(255,255,255,0.3);
        }

        .profile-details {
            flex: 1;
        }

        .profile-name {
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 4px;
        }

        .profile-stats {
            font-size: 13px;
            opacity: 0.9;
        }

        .member-badge {
            display: inline-block;
            background: rgba(255,255,255,0.2);
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 11px;
            margin-left: 8px;
        }

        /* Status Card */
        .status-card {
            background: white;
            margin: -15px 15px 0;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: relative;
            z-index: 10;
            display: flex;
            justify-content: space-around;
        }

        .status-item {
            text-align: center;
            flex: 1;
            cursor: pointer;
        }

        .status-value {
            font-size: 18px;
            font-weight: 600;
            color: #333;
            display: block;
        }

        .status-label {
            font-size: 12px;
            color: #999;
            display: block;
            margin-top: 2px;
        }

        .status-divider {
            width: 1px;
            background: #eee;
            margin: 0 15px;
        }

        /* Main Content */
        .main-content {
            padding-top: 10px;
        }

        /* Section */
        .section {
            background: white;
            margin-bottom: 10px;
            padding: 15px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .section-title {
            font-size: 16px;
            font-weight: 500;
            color: #333;
        }

        .section-link {
            font-size: 13px;
            color: #999;
            text-decoration: none;
        }

        /* Order Grid */
        .order-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
        }

        .order-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .order-icon-wrap {
            width: 48px;
            height: 48px;
            background: #f5f5f5;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            font-size: 24px;
        }

        .order-icon {
            color: #666;
        }

        .order-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ff4757;
            color: white;
            font-size: 10px;
            min-width: 18px;
            height: 18px;
            padding: 0 4px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .order-label {
            font-size: 11px;
            color: #666;
            text-align: center;
            line-height: 1.2;
        }

        /* Promo Banner */
        .promo-banner {
            margin: 10px 15px;
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
            border-radius: 12px;
            padding: 20px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .promo-badge {
            display: inline-block;
            background: rgba(255,255,255,0.2);
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 12px;
            margin-bottom: 8px;
        }

        .promo-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .promo-desc {
            font-size: 13px;
            opacity: 0.95;
            margin-bottom: 12px;
        }

        .promo-btn {
            display: inline-block;
            background: white;
            color: #10B981;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
        }

        /* Menu List */
        .menu-list {
            background: white;
            margin-bottom: 10px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #f5f5f5;
            cursor: pointer;
            text-decoration: none;
            color: #333;
            position: relative;
        }

        .menu-item:last-child {
            border-bottom: none;
        }

        .menu-icon {
            width: 24px;
            height: 24px;
            margin-right: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: #666;
        }

        .menu-text {
            flex: 1;
            font-size: 14px;
        }

        .menu-badge {
            background: #ff4757;
            color: white;
            font-size: 11px;
            padding: 2px 8px;
            border-radius: 10px;
            margin-right: 10px;
            font-weight: 600;
        }

        .menu-arrow {
            color: #ccc;
            font-size: 18px;
        }

        /* Bottom Navigation */
        .bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: white;
            border-top: 1px solid #eee;
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            padding: 8px 0;
            z-index: 100;
        }

        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
            padding: 4px;
            cursor: pointer;
            text-decoration: none;
            color: #999;
        }

        .nav-item.active {
            color: #10B981;
        }

        .nav-icon {
            font-size: 20px;
            height: 24px;
            display: flex;
            align-items: center;
        }

        .nav-label {
            font-size: 10px;
            font-weight: 500;
        }

        .nav-badge {
            position: absolute;
            top: 0;
            right: 50%;
            transform: translateX(12px);
            background: #ff4757;
            color: white;
            font-size: 10px;
            min-width: 16px;
            height: 16px;
            padding: 0 4px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        /* Bottom Spacing */
        .bottom-space {
            height: 80px;
        }

        /* Responsive */
        @media (max-width: 360px) {
            .order-grid {
                grid-template-columns: repeat(4, 1fr);
            }
            
            .order-icon-wrap {
                width: 44px;
                height: 44px;
            }
            
            .order-label {
                font-size: 10px;
            }
        }

        /* Touch Feedback */
        .menu-item:active,
        .order-item:active,
        .status-item:active,
        .nav-item:active,
        .btn-icon:active,
        .promo-btn:active {
            opacity: 0.7;
        }

        /* Safe Area */
        @supports (padding-top: env(safe-area-inset-top)) {
            .header-top {
                padding-top: calc(20px + env(safe-area-inset-top));
            }
            
            .bottom-nav {
                padding-bottom: env(safe-area-inset-bottom);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="header-top">
                <h1 class="header-title">Akun Saya</h1>
                <div class="header-actions">
                    <a href="index.php?c=auth&a=logout" class="btn-icon logout-btn" title="Logout">
                        <span style="font-size:18px;vertical-align:middle;">🔓</span>
                        <span class="logout-label" style="margin-left:6px;font-size:14px;vertical-align:middle;">Logout</span>
                    </a>
                </div>
            </div>
            <div class="profile-info">
                <div class="profile-details">
                    <div class="profile-name">
                        <?= htmlspecialchars($user['nama']) ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status Card -->
        <div class="status-card">
            <div class="status-item">
                <span class="status-value"><?= $orderSummary['voucher'] ?? 0 ?></span>
                <span class="status-label">Voucher</span>
            </div>
            <div class="status-divider"></div>
            <div class="status-item">
                <span class="status-value"><?= $orderSummary['point'] ?? 0 ?></span>
                <span class="status-label">Poin</span>
            </div>
            <div class="status-divider"></div>
            <div class="status-item">
                <span class="status-value"><?= $orderSummary['coin'] ?? 0 ?></span>
                <span class="status-label">Koin</span>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Order Section -->
            <div class="section">
                <div class="section-header">
                    <h2 class="section-title">Pesanan Saya</h2>
                    <a href="history.php" class="section-link">Lihat Riwayat ›</a>
                </div>
                
                <div class="order-grid">
                    <div class="order-item">
                        <div class="order-icon-wrap">
                            <span class="order-icon">💳</span>
                            <span class="order-badge">2</span>
                        </div>
                        <span class="order-label">Belum Bayar</span>
                    </div>
                    
                    <div class="order-item">
                        <div class="order-icon-wrap">
                            <span class="order-icon">📦</span>
                        </div>
                        <span class="order-label">Dikemas</span>
                    </div>
                    
                    <div class="order-item">
                        <div class="order-icon-wrap">
                            <span class="order-icon">🚚</span>
                            <span class="order-badge">1</span>
                        </div>
                        <span class="order-label">Dikirim</span>
                    </div>
                    
                    <div class="order-item">
                        <div class="order-icon-wrap">
                            <span class="order-icon">⭐</span>
                        </div>
                        <span class="order-label">Beri Penilaian</span>
                    </div>
                    
                    <div class="order-item">
                        <div class="order-icon-wrap">
                            <span class="order-icon">↩️</span>
                        </div>
                        <span class="order-label">Pengembalian</span>
                    </div>
                </div>
            </div>

            <!-- Promo Banner -->
            <div class="promo-banner">
                <div class="promo-badge">🎉 Promo Spesial</div>
                <h3 class="promo-title">Belanja Hemat di Pasar Tradisional!</h3>
                <p class="promo-desc">Gratis ongkir Rp0 untuk belanja minimal Rp50.000</p>
                <a href="#" class="promo-btn">Lihat Semua Promo →</a>
            </div>

            <!-- Menu Services -->
            <div class="menu-list">
                <a href="#" class="menu-item">
                    <span class="menu-icon">📱</span>
                    <span class="menu-text">Produk Digital</span>
                    <span class="menu-arrow">›</span>
                </a>
                <a href="#" class="menu-item">
                    <span class="menu-icon">❤️</span>
                    <span class="menu-text">Favorit Saya</span>
                    <span class="menu-badge">12</span>
                    <span class="menu-arrow">›</span>
                </a>
                <a href="#" class="menu-item">
                    <span class="menu-icon">👁️</span>
                    <span class="menu-text">Terakhir Dilihat</span>
                    <span class="menu-arrow">›</span>
                </a>
                <a href="#" class="menu-item">
                    <span class="menu-icon">✍️</span>
                    <span class="menu-text">Ulasan Saya</span>
                    <span class="menu-arrow">›</span>
                </a>
            </div>

            <!-- Menu Account -->
            <div class="menu-list">
                <a href="#" class="menu-item">
                    <span class="menu-icon">📍</span>
                    <span class="menu-text">Daftar Alamat</span>
                    <span class="menu-arrow">›</span>
                </a>
                <a href="#" class="menu-item">
                    <span class="menu-icon">💳</span>
                    <span class="menu-text">Kartu / Rekening Bank</span>
                    <span class="menu-arrow">›</span>
                </a>
                <a href="#" class="menu-item">
                    <span class="menu-icon">🔔</span>
                    <span class="menu-text">Notifikasi</span>
                    <span class="menu-badge">3</span>
                    <span class="menu-arrow">›</span>
                </a>
                <a href="#" class="menu-item">
                    <span class="menu-icon">🔒</span>
                    <span class="menu-text">Keamanan Akun</span>
                    <span class="menu-arrow">›</span>
                </a>
            </div>

            <!-- Menu Support -->
            <div class="menu-list">
                <a href="#" class="menu-item">
                    <span class="menu-icon">❓</span>
                    <span class="menu-text">Pusat Bantuan</span>
                    <span class="menu-arrow">›</span>
                </a>
                <a href="#" class="menu-item">
                    <span class="menu-icon">💬</span>
                    <span class="menu-text">Chat dengan Peukan Rumoh</span>
                    <span class="menu-arrow">›</span>
                </a>
                <a href="#" class="menu-item">
                    <span class="menu-icon">⭐</span>
                    <span class="menu-text">Beri Penilaian</span>
                    <span class="menu-arrow">›</span>
                </a>
            </div>

            <div class="bottom-space"></div>
        </div>

        <!-- Bottom Navigation -->
        <!-- <nav class="bottom-nav">
            <a href="#" class="nav-item">
                <span class="nav-icon">🏠</span>
                <span class="nav-label">Beranda</span>
            </a>
            <a href="#" class="nav-item">
                <span class="nav-icon">📰</span>
                <span class="nav-label">Feed</span>
            </a>
            <a href="#" class="nav-item">
                <span class="nav-icon">📹</span>
                <span class="nav-label">Live</span>
            </a>
            <a href="#" class="nav-item" style="position: relative;">
                <span class="nav-icon">🛒</span>
                <span class="nav-label">Keranjang</span>
                <span class="nav-badge">3</span>
            </a>
            <a href="#" class="nav-item active">
                <span class="nav-icon">👤</span>
                <span class="nav-label">Saya</span>
            </a>
        </nav> -->
    </div>

    <script>
        // Simple click handlers
        document.querySelectorAll('.menu-item, .order-item, .status-item, .promo-btn').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                console.log('Clicked:', this.textContent);
            });
        });

        // Prevent bounce scrolling on iOS
        document.addEventListener('touchmove', function(e) {
            if (e.target.closest('.container')) {
                e.stopPropagation();
            }
        }, { passive: false });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Pesanan Saya - Peukan Rumoh</title>
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
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Header */
        .header {
            background: white;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            border-bottom: 1px solid #eee;
        }

        .header-content {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            gap: 15px;
        }

        .back-btn {
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 20px;
        }

        .header-title {
            flex: 1;
            font-size: 18px;
            font-weight: 500;
        }

        .header-actions {
            display: flex;
            gap: 15px;
        }

        .header-action {
            font-size: 20px;
            cursor: pointer;
        }

        /* Tabs */
        .tabs-container {
            background: white;
            position: fixed;
            top: 49px;
            left: 0;
            right: 0;
            z-index: 99;
            border-bottom: 1px solid #eee;
        }

        .tabs-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .tabs-wrapper::-webkit-scrollbar {
            display: none;
        }

        .tabs {
            display: flex;
            padding: 0 10px;
            min-width: max-content;
        }

        .tab {
            padding: 12px 15px;
            font-size: 14px;
            color: #666;
            cursor: pointer;
            position: relative;
            white-space: nowrap;
            transition: color 0.3s;
        }

        .tab.active {
            color: #10B981;
            font-weight: 500;
        }

        .tab.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: #10B981;
        }

        .tab-badge {
            display: inline-block;
            background: #ff4757;
            color: white;
            font-size: 10px;
            padding: 2px 5px;
            border-radius: 10px;
            margin-left: 5px;
            font-weight: 600;
            vertical-align: top;
        }

        /* Main Content */
        .main-content {
            padding-top: 98px;
            padding-bottom: 20px;
            min-height: 100vh;
        }

        /* Order Card */
        .order-card {
            background: white;
            margin-bottom: 10px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        }

        .order-header {
            padding: 12px 15px;
            border-bottom: 1px solid #f5f5f5;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .shop-info {
            display: flex;
            align-items: center;
            gap: 8px;
            flex: 1;
        }

        .shop-icon {
            font-size: 16px;
        }

        .shop-name {
            font-size: 14px;
            font-weight: 500;
            color: #333;
        }

        .order-status {
            font-size: 13px;
            color: #10B981;
            font-weight: 500;
        }

        /* Order Items */
        .order-items {
            padding: 12px 15px;
            border-bottom: 1px solid #f5f5f5;
        }

        .order-item {
            display: flex;
            gap: 12px;
            margin-bottom: 12px;
        }

        .order-item:last-child {
            margin-bottom: 0;
        }

        .item-image {
            width: 70px;
            height: 70px;
            background: #f5f5f5;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            flex-shrink: 0;
        }

        .item-details {
            flex: 1;
        }

        .item-name {
            font-size: 14px;
            color: #333;
            margin-bottom: 4px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .item-variant {
            font-size: 12px;
            color: #999;
            margin-bottom: 4px;
        }

        .item-price-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .item-price {
            font-size: 14px;
            color: #333;
        }

        .item-qty {
            font-size: 12px;
            color: #999;
        }

        /* Order Summary */
        .order-summary {
            padding: 12px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #f5f5f5;
        }

        .order-total-label {
            font-size: 12px;
            color: #666;
        }

        .order-total {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .total-items {
            font-size: 12px;
            color: #999;
        }

        .total-price {
            font-size: 16px;
            font-weight: 600;
            color: #333;
        }

        /* Order Actions */
        .order-actions {
            padding: 12px 15px;
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }

        .btn {
            padding: 8px 16px;
            border-radius: 4px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }

        .btn-outline {
            background: white;
            border: 1px solid #ddd;
            color: #666;
        }

        .btn-outline:hover {
            border-color: #10B981;
            color: #10B981;
        }

        .btn-primary {
            background: #10B981;
            border: 1px solid #10B981;
            color: white;
        }

        .btn-primary:hover {
            background: #059669;
            border-color: #059669;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-icon {
            font-size: 80px;
            margin-bottom: 20px;
            opacity: 0.3;
        }

        .empty-title {
            font-size: 16px;
            color: #666;
            margin-bottom: 10px;
        }

        .empty-desc {
            font-size: 14px;
            color: #999;
            margin-bottom: 20px;
        }

        .empty-action {
            display: inline-block;
            background: #10B981;
            color: white;
            padding: 10px 24px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
        }

        /* Loading */
        .loading {
            text-align: center;
            padding: 40px;
            color: #999;
        }

        .loading-spinner {
            display: inline-block;
            width: 30px;
            height: 30px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid #10B981;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Order Date */
        .order-date {
            font-size: 12px;
            color: #999;
            margin-left: auto;
        }

        /* Status Colors */
        .status-pending {
            color: #f39c12;
        }

        .status-processing {
            color: #3498db;
        }

        .status-shipped {
            color: #9b59b6;
        }

        .status-delivered {
            color: #10B981;
        }

        .status-cancelled {
            color: #e74c3c;
        }

        /* Responsive */
        @media (max-width: 360px) {
            .tabs {
                padding: 0 5px;
            }
            
            .tab {
                padding: 12px 10px;
                font-size: 13px;
            }
            
            .item-image {
                width: 60px;
                height: 60px;
            }
        }

        /* Safe Area */
        @supports (padding-top: env(safe-area-inset-top)) {
            .header {
                padding-top: env(safe-area-inset-top);
            }
        }

        /* Touch Feedback */
        .tab:active,
        .btn:active,
        .order-card:active,
        .back-btn:active,
        .header-action:active {
            opacity: 0.7;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="header-content">
            <div class="back-btn" onclick="goBack()">‹</div>
            <h1 class="header-title">Pesanan Saya</h1>
            <div class="header-actions">
                <span class="header-action">🔍</span>
                <span class="header-action">💬</span>
            </div>
        </div>
    </div>

    <!-- Tabs -->
    <div class="tabs-container">
        <div class="tabs-wrapper">
            <div class="tabs">
                <div class="tab active" onclick="switchTab(this, 'all')">
                    Semua
                </div>
                <div class="tab" onclick="switchTab(this, 'pending')">
                    Belum Bayar
                    <span class="tab-badge">2</span>
                </div>
                <div class="tab" onclick="switchTab(this, 'processing')">
                    Sedang Dikemas
                </div>
                <div class="tab" onclick="switchTab(this, 'shipped')">
                    Dikirim
                    <span class="tab-badge">1</span>
                </div>
                <div class="tab" onclick="switchTab(this, 'delivered')">
                    Selesai
                </div>
                <div class="tab" onclick="switchTab(this, 'cancelled')">
                    Dibatalkan
                </div>
                <div class="tab" onclick="switchTab(this, 'return')">
                    Pengembalian
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content" id="orderContent">
        <?php if (!empty($orders)): ?>
            <?php foreach ($orders as $order): 
                // Hitung total harga pesanan
                $total = 0;
                foreach ($order['items'] as $item) {
                    $total += $item['harga'] * $item['jumlah'];
                }
            ?>
                <div class="order-card" data-status="<?= htmlspecialchars(strtolower($order['status'])) ?>">
                    <div class="order-header">
                        <div class="shop-info">
                            <span class="shop-icon">🏪</span>
                            <span class="shop-name"><?= htmlspecialchars($order['nama_toko'] ?? '-') ?></span>
                            <span class="order-date"><?= date('d M Y', strtotime($order['tgl_pesanan'])) ?></span>
                        </div>
                        <span class="order-status status-<?= htmlspecialchars(strtolower($order['status'])) ?>">
                            <?= htmlspecialchars($order['status_nama']) ?>
                        </span>
                    </div>
                    <div class="order-items">
                        <?php foreach ($order['items'] as $item): ?>
                            <div class="order-item">
                                <div class="item-image">
                                    📦
                                </div>
                                <div class="item-details">
                                    <div class="item-name"><?= htmlspecialchars($item['nama_produk']) ?></div>
                                    <div class="item-variant"></div>
                                    <div class="item-price-info">
                                        <span class="item-price">Rp<?= number_format($item['harga'], 0, ',', '.') ?></span>
                                        <span class="item-qty">x<?= $item['jumlah'] ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="order-summary">
                        <span class="order-total-label">Total Pesanan:</span>
                        <div class="order-total">
                            <span class="total-items">(<?= count($order['items']) ?> produk)</span>
                            <span class="total-price">Rp<?= number_format($total, 0, ',', '.') ?></span>
                        </div>
                    </div>
                    <div class="order-actions">
                        <!-- Tampilkan tombol sesuai status -->
                        <?php if (strtolower($order['status']) === 'pending'): ?>
                            <a href="#" class="btn btn-outline">Batalkan</a>
                            <a href="#" class="btn btn-primary">Bayar Sekarang</a>
                        <?php elseif (strtolower($order['status']) === 'shipped'): ?>
                            <a href="#" class="btn btn-outline">Lacak Paket</a>
                            <a href="#" class="btn btn-primary">Pesanan Diterima</a>
                        <?php elseif (strtolower($order['status']) === 'completed'): ?>
                            <a href="#" class="btn btn-outline">Beli Lagi</a>
                            <a href="#" class="btn btn-primary">Beri Penilaian</a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="empty-state" id="emptyState">
                <div class="empty-icon">📦</div>
                <div class="empty-title">Belum ada pesanan</div>
                <div class="empty-desc">Yuk mulai belanja produk segar dari pasar tradisional!</div>
                <a href="#" class="empty-action">Mulai Belanja</a>
            </div>
        <?php endif; ?>
    </div>

    <script>
        // Switch tabs
        function switchTab(element, status) {
            // Remove active class from all tabs
            document.querySelectorAll('.tab').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Add active class to clicked tab
            element.classList.add('active');
            
            // Filter orders
            filterOrders(status);
        }

        // Filter orders by status
        function filterOrders(status) {
            const orderCards = document.querySelectorAll('.order-card');
            const emptyState = document.getElementById('emptyState');
            let hasOrders = false;
            
            // Show loading briefly
            showLoading();
            
            setTimeout(() => {
                orderCards.forEach(card => {
                    if (status === 'all' || card.dataset.status === status) {
                        card.style.display = 'block';
                        hasOrders = true;
                    } else {
                        card.style.display = 'none';
                    }
                });
                
                // Show empty state if no orders
                if (!hasOrders) {
                    emptyState.style.display = 'block';
                } else {
                    emptyState.style.display = 'none';
                }
                
                hideLoading();
            }, 300);
        }

        // Show loading state
        function showLoading() {
            document.getElementById('loadingState').style.display = 'block';
            document.querySelectorAll('.order-card').forEach(card => {
                card.style.display = 'none';
            });
            document.getElementById('emptyState').style.display = 'none';
        }

        // Hide loading state
        function hideLoading() {
            document.getElementById('loadingState').style.display = 'none';
        }

        // Go back
        function goBack() {
            window.history.back();
        }

        // Handle order actions
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const action = this.textContent;
                
                // Simulate actions
                switch(action) {
                    case 'Bayar Sekarang':
                        alert('Menuju halaman pembayaran...');
                        break;
                    case 'Beli Lagi':
                        alert('Menambahkan ke keranjang...');
                        break;
                    case 'Beri Penilaian':
                        alert('Menuju halaman penilaian...');
                        break;
                    case 'Lacak Paket':
                        alert('Melacak paket dengan JNT Express...');
                        break;
                    case 'Pesanan Diterima':
                        if(confirm('Konfirmasi pesanan telah diterima?')) {
                            alert('Pesanan dikonfirmasi! Jangan lupa beri penilaian.');
                        }
                        break;
                    case 'Batalkan':
                        if(confirm('Yakin ingin membatalkan pesanan?')) {
                            alert('Pesanan dibatalkan.');
                        }
                        break;
                    case 'Lihat Detail':
                        alert('Menampilkan detail pesanan...');
                        break;
                }
            });
        });

        // Simulate real-time order updates
        function updateOrderCount() {
            const pendingCount = document.querySelectorAll('[data-status="pending"]').length;
            const shippedCount = document.querySelectorAll('[data-status="shipped"]').length;
            
            // Update tab badges
            document.querySelectorAll('.tab').forEach(tab => {
                if (tab.textContent.includes('Belum Bayar')) {
                    const badge = tab.querySelector('.tab-badge');
                    if (badge) badge.textContent = pendingCount;
                }
                if (tab.textContent.includes('Dikirim')) {
                    const badge = tab.querySelector('.tab-badge');
                    if (badge) badge.textContent = shippedCount;
                }
            });
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            updateOrderCount();
        });

        // Prevent bounce scrolling on iOS
        document.addEventListener('touchmove', function(e) {
            if (e.target.closest('.tabs-wrapper')) {
                e.stopPropagation();
            }
        }, { passive: false });
    </script>
</body>
</html>
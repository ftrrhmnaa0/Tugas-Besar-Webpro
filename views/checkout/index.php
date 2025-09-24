<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            margin: 0;
            padding: 2rem;
        }
        .card {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        h2, h3 {
            margin-top: 0;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        .form-group {
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: bold;
            margin-bottom: 0.3rem;
        }
        input[type="text"],
        input[type="tel"],
        select,
        textarea {
            padding: 0.5rem;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #ccc;
            resize: vertical;
        }
        select {
            cursor: pointer;
        }
        textarea {
            font-family: inherit;
        }
        .btn {
            display: inline-block;
            background-color: #28a745;
            color: white;
            border: none;
            padding: 1rem;
            font-size: 1.2rem;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
            margin-top: 1rem;
            user-select: none;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #218838;
        }
        .grid-container {
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 2rem;
            max-width: 1000px;
            margin: auto;
        }
        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }
        hr {
            border: none;
            border-top: 1px solid #ddd;
            margin: 1rem 0;
        }
        .summary-total {
            font-weight: bold;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>

<div class="grid-container">
    <div class="card">
        <h2>📋 Informasi Pengiriman</h2>
        <?php if (!empty($error)): ?>
            <div style="color:red;"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <?php if (!empty($success)): ?>
            <div style="color:green;"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>
        <form method="POST" id="checkout-form">
            <div class="form-group">
                <label for="recipient_name">Nama Penerima:</label>
                <input type="text" id="recipient_name" name="recipient_name" required>
            </div>
            <div class="form-group">
                <label for="phone">Nomor Telepon:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="address">Alamat Lengkap:</label>
                <textarea id="address" name="address" rows="4" required placeholder="Masukkan alamat lengkap termasuk kode pos"></textarea>
            </div>
            <div class="form-group">
                <label for="payment_method">Metode Pembayaran:</label>
                <select id="payment_method" name="payment_method" required>
                    <option value="">Pilih metode pembayaran</option>
                    <option value="transfer">Transfer Bank</option>
                    <option value="cod">COD (Bayar di Tempat)</option>
                    <option value="ewallet">E-Wallet</option>
                    <option value="credit_card">Kartu Kredit</option>
                </select>
            </div>
            <div class="form-group">
                <label for="notes">Catatan (Opsional):</label>
                <textarea id="notes" name="notes" rows="3" placeholder="Catatan untuk penjual"></textarea>
            </div>
        </form>
    </div>
    
    <div class="card">
        <h3>📦 Ringkasan Pesanan</h3>
        <div>
            <?php if (!empty($cart)): ?>
                <?php foreach ($cart as $item): ?>
                    <div class="summary-item">
                        <span><?= htmlspecialchars($item['name']) ?> (<?= $item['quantity'] ?>x)</span>
                        <span>Rp <?= number_format($item['price'], 0, ',', '.') ?></span>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="summary-item">Keranjang kosong.</div>
            <?php endif; ?>
        </div>
        <hr>
        <div style="margin: 1rem 0;">
            <div class="summary-item">
                <span>Subtotal:</span>
                <span>Rp <?= number_format($subtotal, 0, ',', '.') ?></span>
            </div>
            <div class="summary-item">
                <span>Ongkos Kirim:</span>
                <span>Rp <?= number_format($shipping, 0, ',', '.') ?></span>
            </div>
            <div class="summary-item summary-total">
                <span>Total:</span>
                <span>Rp <?= number_format($total, 0, ',', '.') ?></span>
            </div>
        </div>
        <button type="submit" form="checkout-form" class="btn btn-success">
            🛒 Buat Pesanan
        </button>
    </div>
</div>

<script>
  // Supaya tombol submit mengirim form yang ada di sebelah kiri
  document.querySelector('button[type="submit"]').addEventListener('click', function(e) {
    e.preventDefault();
    document.querySelector('form').submit();
  });
</script>

</body>
</html>

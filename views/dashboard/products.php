<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kelola Produk</title>
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
            max-width: 1000px;
            margin: auto;
        }
        h1 {
            margin: 0;
        }
        .btn {
            display: inline-block;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-size: 1rem;
            user-select: none;
        }
        .btn-success {
            background-color: #28a745;
            color: white;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            color: white;
            padding: 0.4rem 0.7rem;
            border-radius: 4px;
            font-size: 1.1rem;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
            color: white;
            padding: 0.4rem 0.7rem;
            border-radius: 4px;
            font-size: 1.1rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 1rem;
            border: 1px solid #ddd;
            text-align: left;
            vertical-align: middle;
        }
        thead tr {
            background-color: #f8f9fa;
        }
        .status-active {
            background-color: #28a745;
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 3px;
            font-size: 0.9rem;
            display: inline-block;
        }
        .product-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(45deg, #f0f0f0, #e0e0e0);
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        .actions {
            display: flex;
            gap: 0.5rem;
        }
    </style>
</head>
<body>

<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h1>📦 Kelola Produk</h1>
        <a href="index.php?c=dashboard&a=add_products" class="btn btn-success">➕ Tambah Produk</a>
    </div>
    
    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
<?php if (!empty($produk)): ?>
    <?php foreach ($produk as $p): ?>
        <tr>
            <td>
                <?php if (!empty($p['gambar'])): ?>
                    <img src="assets/images/products/<?= htmlspecialchars($p['gambar']) ?>" alt="" style="width:50px;height:50px;border-radius:5px;">
                <?php else: ?>
                    <div class="product-icon">📦</div>
                <?php endif; ?>
            </td>
            <td><?= htmlspecialchars($p['nama_produk']) ?></td>
            <td>
                <?= isset($kategoriMap[$p['id_kat']]) ? htmlspecialchars($kategoriMap[$p['id_kat']]) : '-' ?>
            </td>
            <td>Rp <?= number_format($p['harga'], 0, ',', '.') ?></td>
            <td><?= $p['stok'] ?></td>
            <td>
                <span class="status-<?= strtolower($p['statusPro']) === 'aktif' ? 'active' : 'inactive' ?>">
                    <?= strtolower($p['statusPro']) === 'aktif' ? 'Aktif' : 'Tidak Aktif' ?>
                </span>
            </td>
            <td>
                <div class="actions">
                    <a href="index.php?c=dashboard&a=edit_product&id=<?= $p['id_produk'] ?>" class="btn btn-primary" title="Edit">✏️</a>
                    <a href="index.php?c=dashboard&a=delete_product&id=<?= $p['id_produk'] ?>" class="btn btn-danger" title="Hapus" onclick="return confirm('Hapus produk ini?')">🗑️</a>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr><td colspan="7">Belum ada produk.</td></tr>
<?php endif; ?>
</tbody>
        </table>
    </div>
</div>

</body>
</html>

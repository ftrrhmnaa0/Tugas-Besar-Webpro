<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Edit Produk</title>
  <style>
    /* Style sama seperti sebelumnya */
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      margin: 0;
      padding: 2rem;
    }

    .card {
      background: white;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      max-width: 1000px;
      margin: auto;
    }

    h1 {
      margin-bottom: 1.5rem;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }

    input[type="text"],
    input[type="number"],
    input[type="file"],
    select,
    textarea {
      padding: 0.75rem;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 1rem;
    }

    textarea {
      resize: vertical;
    }

    .form-columns {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 2rem;
    }

    .btn {
      display: inline-block;
      padding: 0.75rem 1.5rem;
      border: none;
      border-radius: 6px;
      font-size: 1rem;
      cursor: pointer;
      text-decoration: none;
      color: white;
    }

    .btn-success {
      background-color: #28a745;
    }

    .btn-danger {
      background-color: #dc3545;
    }

    small {
      color: #666;
    }
  </style>
</head>
<body>

<div class="card">
  <h1>✏️ Edit Produk</h1>

  <form method="POST" enctype="multipart/form-data" action="index.php?c=dashboard&a=edit_product&id=<?= $produk['id_produk'] ?>">
    <input type="hidden" name="id_produk" value="<?= $produk['id_produk'] ?>">

    <div class="form-columns">
      <div>
        <div class="form-group">
          <label>Nama Produk:</label>
          <input type="text" name="nama_produk" required value="<?= htmlspecialchars($produk['nama_produk']) ?>">
        </div>

        <div class="form-group">
          <label>Kategori:</label>
          <select name="id_kat" required>
            <option value="">Pilih kategori</option>
            <?php foreach ($kategoriList as $kat): ?>
              <option value="<?= htmlspecialchars($kat['id_kat']) ?>" <?= $produk['id_kat'] == $kat['id_kat'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($kat['nama_kat']) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="form-group">
          <label>Harga (Rp):</label>
          <input type="number" name="harga" required min="0" value="<?= $produk['harga'] ?>">
        </div>

        <div class="form-group">
          <label>Stok:</label>
          <input type="number" name="stok" required min="0" value="<?= $produk['stok'] ?>">
        </div>

        <div class="form-group">
          <label>Satuan (opsional):</label>
          <input type="text" name="satuan" value="<?= htmlspecialchars($produk['satuan']) ?>">
        </div>
      </div>

      <div>
        <div class="form-group">
          <label>Gambar Produk (kosongkan jika tidak diganti):</label>
          <input type="file" name="gambar" accept="image/*">
            <?php if (!empty($produk['gambar'])): ?>
            <br><img src="assets/images/products/<?= $produk['gambar'] ?>" alt="Gambar Produk" style="max-width: 150px; margin-top: 10px;">
            <?php endif; ?>
        </div>

        <div class="form-group">
          <label>Status Produk:</label>
          <select name="statusPro" required>
            <option value="Aktif" <?= $produk['statusPro'] == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
            <option value="Tidak Aktif" <?= $produk['statusPro'] == 'Tidak Aktif' ? 'selected' : '' ?>>Tidak Aktif</option>
          </select>
        </div>
      </div>
    </div>

    <div style="display: flex; gap: 1rem;">
      <button type="submit" class="btn btn-success">💾 Perbarui Produk</button>
      <a href="index.php?c=dashboard&a=products" class="btn btn-danger">❌ Batal</a>
    </div>
  </form>
</div>

</body>
</html>

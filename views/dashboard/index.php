<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard Penjual</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f4f4f4;
    }

    .layout {
      display: grid;
      grid-template-columns: 250px 1fr;
      min-height: 100vh;
    }

    .sidebar {
      background: #2c3e50;
      color: white;
      padding: 2rem 1rem;
    }

    .sidebar h3 {
      margin-bottom: 2rem;
      font-size: 1.2rem;
      text-align: center;
    }

    .sidebar a {
      display: block;
      text-decoration: none;
      color: white;
      padding: 0.75rem 1rem;
      border-radius: 8px;
      margin-bottom: 1rem;
      transition: background 0.2s;
    }

    .sidebar a:hover {
      background: #34495e;
    }

    .content {
      padding: 2rem;
    }

    .card {
      background: #fff;
      padding: 1.5rem;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
      margin-bottom: 2rem;
    }

    .dashboard-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 1.5rem;
    }

    .dashboard-card {
      background: #ffffff;
      padding: 1rem;
      border-radius: 10px;
      box-shadow: 0 0 8px rgba(0,0,0,0.08);
    }

    .dashboard-card h3 {
      margin-bottom: 0.5rem;
      font-size: 1rem;
    }

    .dashboard-number {
      font-size: 1.8rem;
      font-weight: bold;
      margin: 0.5rem 0;
      color: #2c3e50;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 0.75rem;
      border: 1px solid #ddd;
      text-align: left;
    }

    th {
      background: #f8f9fa;
    }

    .badge {
      padding: 0.25rem 0.5rem;
      border-radius: 3px;
      font-size: 0.8rem;
    }

    .badge-success {
      background: #28a745;
      color: white;
    }

    .badge-warning {
      background: #ffc107;
      color: black;
    }
  </style>
</head>
<body>

  <div class="layout">
    <!-- Sidebar Menu Cepat -->
    <aside class="sidebar">
      <h3>Dasjboard</h3>
      <a href="index.php?c=dashboard&a=add_products">➕ Tambah Produk</a>
      <a href="index.php?c=dashboard&a=products">📦 Kelola Produk</a>
      <a href="index.php?page=chat">💬 Chat Pelanggan</a>
      <a href="index.php?page=profile">⚙️ Pengaturan Toko</a>
    </aside>

    <!-- Konten Utama -->
    <main class="content">
      <div class="card">
        <h1><?= htmlspecialchars($nama_toko) ?></h1>
      </div>

      <div class="dashboard-grid">
        <div class="dashboard-card">
          <h3>💰 Total Penjualan</h3>
          <div class="dashboard-number"><?= $summary['penjualan'] ?? 0 ?></div>
          <p>Pesanan bulan ini</p>
        </div>
        
        <div class="dashboard-card">
          <h3>💵 Pendapatan</h3>
          <div class="dashboard-number">Rp <?= number_format($summary['pendapatan'] ?? 0, 0, ',', '.') ?></div>
          <p>Pendapatan bulan ini</p>
        </div>
        
        <div class="dashboard-card">
          <h3>📦 Produk</h3>
          <div class="dashboard-number"><?= $summary['produk'] ?? 0 ?></div>
          <p>Total produk aktif</p>
        </div>
        
        <div class="dashboard-card">
          <h3>⭐ Rating</h3>
          <div class="dashboard-number"><?= $summary['rating'] ?? '-' ?></div>
          <p>Rating toko</p>
        </div>
      </div>

      <div class="card">
        <h3>📈 Penjualan Terbaru</h3>
        <div style="overflow-x: auto;">
          <table>
            <thead>
              <tr>
                <th>Pesanan</th>
                <th>Produk</th>
                <th>Total</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>#ORD003</td>
                <td>iPhone 14 Pro</td>
                <td>Rp 18.999.000</td>
                <td><span class="badge badge-success">Selesai</span></td>
              </tr>
              <tr>
                <td>#ORD004</td>
                <td>MacBook Air</td>
                <td>Rp 18.999.000</td>
                <td><span class="badge badge-warning">Proses</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>

</body>
</html>

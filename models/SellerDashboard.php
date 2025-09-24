<?php
require_once 'core/Model.php';

class SellerDashboard extends Model
{

    public function getSummary($id_toko)
    {
        // Total produk aktif
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM produk WHERE id_toko = ? AND statusPro = 'Aktif'");
        $stmt->execute([$id_toko]);
        $produk = $stmt->fetchColumn();

        // Total penjualan bulan ini (contoh, sesuaikan dengan struktur tabel penjualan Anda)
        $stmt = $this->db->prepare("
            SELECT COUNT(*) FROM penjualan 
            WHERE id_toko = ? AND MONTH(tanggal) = MONTH(CURDATE()) AND YEAR(tanggal) = YEAR(CURDATE())
        ");
        $stmt->execute([$id_toko]);
        $penjualan = $stmt->fetchColumn();

        // Total pendapatan bulan ini (contoh, sesuaikan dengan struktur tabel penjualan Anda)
        $stmt = $this->db->prepare("
            SELECT SUM(total) FROM penjualan 
            WHERE id_toko = ? AND MONTH(tanggal) = MONTH(CURDATE()) AND YEAR(tanggal) = YEAR(CURDATE())
        ");
        $stmt->execute([$id_toko]);
        $pendapatan = $stmt->fetchColumn();

        // Rating toko (jika ada)
        $rating = null; // Implementasi sesuai kebutuhan

        return [
            'produk'     => $produk,
            'penjualan'  => $penjualan,
            'pendapatan' => $pendapatan,
            'rating'     => $rating
        ];
    }
}
?>
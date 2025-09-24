<?php
require_once 'core/Model.php';

class Profile extends Model
{
    // Ambil data user (pembeli)
    public function getUser($userId)
    {
        $stmt = $this->db->prepare("SELECT id_pembeli AS id, nama, email FROM pembeli WHERE id_pembeli = ?");
        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Ambil ringkasan pesanan user (jumlah per status)
    public function getOrderSummary($userId)
    {
        $stmt = $this->db->prepare("
            SELECT s.status, COUNT(*) as jumlah
            FROM pesanan p
            LEFT JOIN statusjual sj ON p.no_resi = sj.no_resi
            LEFT JOIN status s ON sj.id_status = s.id_status
            WHERE p.id_pembeli = ?
            GROUP BY s.status
        ");
        $stmt->execute([$userId]);
        $result = [];
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $result[$row['status']] = $row['jumlah'];
        }
        return $result;
    }

    // Ambil semua pesanan user
    public function getOrders($userId)
    {
        $stmt = $this->db->prepare("
            SELECT 
                p.no_resi,
                p.tgl_pesanan,
                t.nama_toko,
                s.status,
                s.nama AS status_nama,
                MAX(sj.tanggal) as created_at
            FROM pesanan p
            LEFT JOIN statusjual sj ON p.no_resi = sj.no_resi
            LEFT JOIN status s ON sj.id_status = s.id_status
            LEFT JOIN detijual dj ON p.no_resi = dj.no_resi
            LEFT JOIN produk pr ON dj.id_produk = pr.id_produk
            LEFT JOIN toko t ON pr.id_toko = t.id_toko
            WHERE p.id_pembeli = ?
            GROUP BY p.no_resi
            ORDER BY p.tgl_pesanan DESC
        ");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil detail item pesanan
    public function getOrderItems($noResi)
    {
        $stmt = $this->db->prepare("
            SELECT 
                dj.id_detil,
                pr.nama_produk,
                pr.harga,
                pr.id_produk,
                dj.jumlah,
                pr.id_toko
            FROM detijual dj
            LEFT JOIN produk pr ON dj.id_produk = pr.id_produk
            WHERE dj.no_resi = ?
        ");
        $stmt->execute([$noResi]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
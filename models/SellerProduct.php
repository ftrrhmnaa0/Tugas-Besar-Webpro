<?php
require_once 'core/Model.php';

class SellerProduct extends Model
{
    // Ambil semua produk milik penjual
    public function getAll($sellerId)
    {
        $stmt = $this->db->prepare("SELECT * FROM produk WHERE id_toko = ? ORDER BY id_produk DESC");
        $stmt->execute([$sellerId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Tambah produk baru
    public function add($sellerId, $data, $imageName)
    {
        // Validasi id_kat harus ada di tabel kategori
        $stmtCheck = $this->db->prepare("SELECT 1 FROM kategori WHERE id_kat = ?");
        $stmtCheck->execute([$data['id_kat']]);
        if (!$stmtCheck->fetch()) {
            throw new Exception("Kategori tidak valid!");
        }

        $stmt = $this->db->prepare("INSERT INTO produk 
            (id_produk, nama_produk, harga, stok, satuan, statusPro, gambar, id_toko, id_kat) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Generate id_produk unik (misal: PRD + timestamp)
        $id_produk = 'PRD' . time();

        return $stmt->execute([
            $id_produk,
            $data['nama_produk'],
            $data['harga'],
            $data['stok'],
            $data['satuan'] ?? null,
            $data['statusPro'],
            $imageName,
            $sellerId,
            $data['id_kat']
        ]);
    }

    // Hapus produk
    public function delete($sellerId, $productId)
    {
        $stmt = $this->db->prepare("DELETE FROM produk WHERE id_produk = ? AND id_toko = ?");
        return $stmt->execute([$productId, $sellerId]);
    }

    // Update produk
    public function update($sellerId, $data, $id_produk)
    {
        $stmt = $this->db->prepare("UPDATE produk SET 
            nama_produk = ?, 
            harga = ?, 
            stok = ?, 
            satuan = ?, 
            statusPro = ?, 
            id_kat = ?
            WHERE id_produk = ? AND id_toko = ?");
        return $stmt->execute([
            $data['nama_produk'],
            $data['harga'],
            $data['stok'],
            $data['satuan'],
            $data['statusPro'],
            $data['id_kat'],
            $id_produk,
            $sellerId
        ]);
    }

    // Update produk secara penuh (termasuk gambar)
    public function updateFull($sellerId, $data, $id_produk)
    {
        $stmt = $this->db->prepare("UPDATE produk SET 
            nama_produk = ?, 
            harga = ?, 
            stok = ?, 
            satuan = ?, 
            statusPro = ?, 
            id_kat = ?,
            gambar = ?
            WHERE id_produk = ? AND id_toko = ?");
        return $stmt->execute([
            $data['nama_produk'],
            $data['harga'],
            $data['stok'],
            $data['satuan'],
            $data['statusPro'],
            $data['id_kat'],
            $data['gambar'],
            $id_produk,
            $sellerId
        ]);
    }

    // Ambil produk berdasarkan ID
    public function getById($sellerId, $id_produk)
    {
        $stmt = $this->db->prepare("SELECT * FROM produk WHERE id_produk = ? AND id_toko = ?");
        $stmt->execute([$id_produk, $sellerId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
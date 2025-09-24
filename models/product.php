<?php
require_once 'core/Model.php';

class Product extends Model {
    // Ambil semua produk aktif beserta nama toko dan kategori
    public function getAll() {
        $stmt = $this->db->query("
            SELECT p.*, t.nama_toko, k.nama_kat
            FROM produk p
            LEFT JOIN toko t ON p.id_toko = t.id_toko
            LEFT JOIN kategori k ON p.id_kat = k.id_kat
            WHERE p.statusPro = 'Aktif'
            ORDER BY p.id_produk DESC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Produk unggulan (misal: stok terbanyak)
    public function getFeatured($limit = 8) {
        $stmt = $this->db->prepare("
            SELECT p.*, t.nama_toko, k.nama_kat
            FROM produk p
            LEFT JOIN toko t ON p.id_toko = t.id_toko
            LEFT JOIN kategori k ON p.id_kat = k.id_kat
            WHERE p.statusPro = 'Aktif'
            ORDER BY p.stok DESC
            LIMIT ?
        ");
        $stmt->bindValue(1, (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Produk berdasarkan kategori
    public function getByCategory($id_kat) {
        $stmt = $this->db->prepare("
            SELECT p.*, t.nama_toko, k.nama_kat
            FROM produk p
            LEFT JOIN toko t ON p.id_toko = t.id_toko
            LEFT JOIN kategori k ON p.id_kat = k.id_kat
            WHERE p.id_kat = ? AND p.statusPro = 'Aktif'
        ");
        $stmt->execute([$id_kat]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Pencarian produk
    public function search($query) {
        $searchTerm = "%$query%";
        $stmt = $this->db->prepare("
            SELECT p.*, t.nama_toko, k.nama_kat
            FROM produk p
            LEFT JOIN toko t ON p.id_toko = t.id_toko
            LEFT JOIN kategori k ON p.id_kat = k.id_kat
            WHERE (p.nama_produk LIKE ? OR k.nama_kat LIKE ? OR t.nama_toko LIKE ?)
            AND p.statusPro = 'Aktif'
        ");
        $stmt->execute([$searchTerm, $searchTerm, $searchTerm]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Daftar kategori
    public function getCategories() {
        $stmt = $this->db->query("SELECT id_kat, nama_kat FROM kategori");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Produk berdasarkan toko
    public function getByToko($id_toko) {
        $stmt = $this->db->prepare("
            SELECT p.*, k.nama_kat
            FROM produk p
            LEFT JOIN kategori k ON p.id_kat = k.id_kat
            WHERE p.id_toko = ?
            ORDER BY p.id_produk DESC
        ");
        $stmt->execute([$id_toko]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Tambah produk baru
    public function create($nama_produk, $harga, $stok, $satuan, $statusPro, $id_toko, $id_kat, $gambar = null) {
        try {
            $stmt = $this->db->prepare("
                INSERT INTO produk (id_produk, nama_produk, harga, stok, satuan, statusPro, gambar, id_toko, id_kat)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
            ");
            $id_produk = 'PRD' . time();
            return $stmt->execute([$id_produk, $nama_produk, $harga, $stok, $satuan, $statusPro, $gambar, $id_toko, $id_kat]);
        } catch (PDOException $e) {
            return false;
        }
    }

    // Ambil produk berdasarkan ID
    public function getById($id_produk) {
        $stmt = $this->db->prepare("
            SELECT p.*, t.nama_toko, k.nama_kat
            FROM produk p
            LEFT JOIN toko t ON p.id_toko = t.id_toko
            LEFT JOIN kategori k ON p.id_kat = k.id_kat
            WHERE p.id_produk = ?
        ");
        $stmt->execute([$id_produk]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update produk
    public function update($id_produk, $nama_produk, $harga, $stok, $satuan, $statusPro, $id_kat, $gambar = null) {
        try {
            if ($gambar) {
                $stmt = $this->db->prepare("
                    UPDATE produk
                    SET nama_produk = ?, harga = ?, stok = ?, satuan = ?, statusPro = ?, id_kat = ?, gambar = ?
                    WHERE id_produk = ?
                ");
                return $stmt->execute([$nama_produk, $harga, $stok, $satuan, $statusPro, $id_kat, $gambar, $id_produk]);
            } else {
                $stmt = $this->db->prepare("
                    UPDATE produk
                    SET nama_produk = ?, harga = ?, stok = ?, satuan = ?, statusPro = ?, id_kat = ?
                    WHERE id_produk = ?
                ");
                return $stmt->execute([$nama_produk, $harga, $stok, $satuan, $statusPro, $id_kat, $id_produk]);
            }
        } catch (PDOException $e) {
            return false;
        }
    }

    // Nonaktifkan produk (soft delete)
    public function delete($id_produk) {
        try {
            $stmt = $this->db->prepare("UPDATE produk SET statusPro = 'Tidak Aktif' WHERE id_produk = ?");
            return $stmt->execute([$id_produk]);
        } catch (PDOException $e) {
            return false;
        }
    }

    // Hitung produk per toko
    public function countByToko($id_toko) {
        $stmt = $this->db->prepare("SELECT COUNT(*) as count FROM produk WHERE id_toko = ? AND statusPro = 'Aktif'");
        $stmt->execute([$id_toko]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] ?? 0;
    }

    // Produk terbaru
    public function getLatest($limit = 8) {
        $stmt = $this->db->prepare("
            SELECT id_produk, nama_produk, harga, stok, gambar
            FROM produk
            WHERE statusPro = 'Aktif'
            ORDER BY id_produk DESC
            LIMIT ?
        ");
        $stmt->bindValue(1, (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
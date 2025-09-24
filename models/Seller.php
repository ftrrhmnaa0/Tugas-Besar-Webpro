<?php
require_once 'core/Model.php';

class Seller extends Model
{
    // Register seller
    public function register($nama_toko, $alamat_toko, $username, $email, $password)
    {
        // Cek email atau username sudah terdaftar
        $stmt = $this->db->prepare("SELECT id_toko FROM toko WHERE email = ? OR username = ?");
        $stmt->execute([$email, $username]);
        if ($stmt->fetch()) {
            return 'Email atau username sudah terdaftar!';
        }

        // Simpan seller baru
        $stmt = $this->db->prepare("INSERT INTO toko (nama_toko, alamat_toko, username, email, password) VALUES (?, ?, ?, ?, ?)");
        if ($stmt->execute([$nama_toko, $alamat_toko, $username, $email, $password])) {
            return true;
        }
        return 'Registrasi gagal, coba lagi!';
    }

    // Login seller (bisa pakai email atau username)
    public function login($login, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM toko WHERE (email = ? OR username = ?) AND password = ?");
        $stmt->execute([$login, $login, $password]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return $user;
        }
        return false;
    }
}
?>
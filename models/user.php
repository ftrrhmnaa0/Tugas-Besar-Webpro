<?php
require_once 'core/Model.php';

class User extends Model
{
    public function register($name, $email, $password, $username = null)
    {
        // Jika username tidak diberikan, buat dari email sebelum @
        if (!$username) {
            $username = explode('@', $email)[0];
        }

        // Cek email sudah terdaftar
        $stmt = $this->db->prepare("SELECT id_pembeli FROM Pembeli WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            return 'Email sudah terdaftar!';
        }

        // Cek username sudah terdaftar
        $stmt = $this->db->prepare("SELECT id_pembeli FROM Pembeli WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetch()) {
            return 'Username sudah terdaftar!';
        }

        // Generate id_pembeli unik (misal: PBxxxxx)
        $id_pembeli = 'PB' . str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);

        // Simpan user baru
        $stmt = $this->db->prepare("INSERT INTO Pembeli (id_pembeli, username, nama, email, password) VALUES (?, ?, ?, ?, ?)");
        if ($stmt->execute([$id_pembeli, $username, $name, $email, $password])) {
            return true;
        }
        return 'Registrasi gagal, coba lagi!';
    }

    public function login($email, $password)
    {
        $stmt = $this->db->prepare("SELECT id_pembeli AS id, nama, email FROM Pembeli WHERE email = ? AND password = ?");
        $stmt->execute([$email, $password]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return $user;
        }
        return false;
    }
}
?>
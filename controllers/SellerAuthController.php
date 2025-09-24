<?php
require_once 'core/Controller.php';
require_once 'models/Seller.php';

class SellerAuthController extends Controller
{
    private $sellerModel;

    public function __construct()
    {
        $this->sellerModel = new Seller();
    }

    public function register()
    {
        $error = $success = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama_toko = trim($_POST['nama_toko'] ?? '');
            $alamat_toko = trim($_POST['alamat_toko'] ?? '');
            $username = trim($_POST['username'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $confirm_password = $_POST['confirm_password'] ?? '';

            // Validasi sederhana
            if (!$nama_toko || !$alamat_toko || !$username || !$email || !$password || !$confirm_password) {
                $error = 'Semua field wajib diisi!';
            } elseif ($password !== $confirm_password) {
                $error = 'Konfirmasi password tidak sesuai!';
            } elseif (strlen($password) < 6) {
                $error = 'Password minimal 6 karakter!';
            } else {
                $result = $this->sellerModel->register($nama_toko, $alamat_toko, $username, $email, $password);
                if ($result === true) {
                    $success = 'Registrasi berhasil! Silakan login.';
                } else {
                    $error = $result;
                }
            }
        }
        include 'views/sellerauth/register.php';
    }

    public function login()
    {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = trim($_POST['login'] ?? '');
            $password = $_POST['password'] ?? '';

            if (!$login || !$password) {
                $error = 'Semua field wajib diisi!';
            } else {
                $user = $this->sellerModel->login($login, $password);
                if ($user) {
                    $_SESSION['seller'] = $user;
                    header('Location: index.php?c=dashboard'); // arahkan ke dashboard seller
                    exit;
                } else {
                    $error = 'Email/Username atau password salah!';
                }
            }
        }
        include 'views/sellerauth/login.php';
    }

    public function logout()
    {
        unset($_SESSION['seller']);
        session_destroy();
        header('Location: login.php');
        exit;
    }
}
?>
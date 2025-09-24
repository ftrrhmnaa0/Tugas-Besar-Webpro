<?php
require_once 'core/Controller.php';
require_once 'models/User.php';

class AuthController extends Controller {
    private $userModel;
    
    public function __construct() {
        $this->userModel = new User();
    }
    
    public function login() {
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            if (!$email || !$password) {
                $error = 'Email dan password wajib diisi!';
            } else {
                $user = $this->userModel->login($email, $password);
                if ($user) {
                // Pastikan $user berisi ['id' => ..., 'nama' => ..., dst]
                $_SESSION['user'] = [
                    'id'   => $user['id'],
                    'nama' => $user['nama'],
                    'email'=> $user['email']
                ];
                header('Location: index.php');
                exit;
                } else {
                    $error = 'Email atau password salah!';
                }
            }
        }
        include 'views/auth/login.php';
    }
    
    public function register() {
        $error = $success = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $username = trim($_POST['username'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            if (!$name || !$username || !$email || !$password) {
                $error = 'Semua field wajib diisi!';
            } else {
                $result = $this->userModel->register($name, $email, $password, $username);
                if ($result === true) {
                    $success = 'Registrasi berhasil! Silakan login.';
                } else {
                    $error = $result;
                }
            }
        }
        include 'views/auth/register.php';
    }
    
    public function logout() {
        unset($_SESSION['user']);
        session_destroy();
        header('Location: index.php?c=auth&a=login');
    exit;
}
}

?>
<?php
require_once 'core/Controller.php';
require_once 'models/Profile.php';

class ProfileController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new Profile();
    }

    // Halaman profil utama
    public function index()
    {
        if (!isset($_SESSION['user']['id'])) {
            header('Location: index.php?c=auth&a=login');
            exit;
        }
        $userId = $_SESSION['user']['id'];
        $user = $this->model->getUser($userId);
        $orderSummary = $this->model->getOrderSummary($userId);
        $this->view('profile/index', [
            'user' => $user,
            'orderSummary' => $orderSummary
        ]);
    }

    // Halaman riwayat pesanan
    public function history()
{
    $userId = $_SESSION['user']['id'];
    $orders = $this->model->getOrders($userId);
    // Ambil item untuk setiap order
    foreach ($orders as &$order) {
        $order['items'] = $this->model->getOrderItems($order['no_resi']);
    }
    $this->view('profile/history', [
        'orders' => $orders
    ]);
}
}
?>
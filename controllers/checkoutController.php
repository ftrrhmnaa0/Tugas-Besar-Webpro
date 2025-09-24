<?php
require_once 'core/Controller.php';
require_once 'models/Order.php';

class CheckoutController extends Controller
{
    private $orderModel;

    public function __construct()
    {
        $this->orderModel = new Order();
    }

    public function index()
    {
        if (!isset($_SESSION['user']['id'])) {
            header('Location: ../auth/login.php');
            exit;
        }
        $userId = $_SESSION['user']['id'];
        $cart = $this->orderModel->getCartSummary($userId);

        // Hitung subtotal dan total
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        $shipping = 25000;
        $total = $subtotal + $shipping;

        // Proses submit form
        $success = $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $recipient = $_POST['recipient_name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $payment = $_POST['payment_method'];
            $notes = $_POST['notes'] ?? '';
            if ($this->orderModel->create($userId, $recipient, $phone, $address, $payment, $notes, $cart, $shipping)) {
                $success = "Pesanan berhasil dibuat!";
                // Redirect atau tampilkan pesan sukses
                header('Location: ../orders/index.php?success=1');
                exit;
            } else {
                $error = "Gagal membuat pesanan. Silakan coba lagi.";
            }
        }

        $this->view('checkout/index', [
            'cart' => $cart,
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'total' => $total,
            'success' => $success,
            'error' => $error
        ]);
    }
}
?>
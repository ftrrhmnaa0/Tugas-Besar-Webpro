<?php
require_once 'core/Controller.php';
require_once 'models/Cart.php';

class CartController extends Controller
{
    private $cartModel;

    public function __construct()
    {
        $this->cartModel = new Cart();
    }

    // Tampilkan halaman keranjang
    public function index()
    {
        if (!isset($_SESSION['user']['id'])) {
            header('Location: index.php?c=auth&a=login');
            exit;
        }
        $cart = $this->cartModel->getCartByUser($_SESSION['user']['id']);
        $this->view('cart/index', ['cart' => $cart]);
    }

    // Tambah/update item ke keranjang
    public function add()
    {
        if (!isset($_SESSION['user']['id'])) {
            header('Location: index.php?c=auth&a=login');
            exit;
        }
        $id_pembeli = $_SESSION['user']['id'];
        $id_produk = $_POST['id_produk'] ?? null;
        $quantity = isset($_POST['quantity']) ? max(1, (int)$_POST['quantity']) : 1;

        if ($id_produk) {
            // Cek apakah produk sudah ada di keranjang
            $row = $this->cartModel->getCartItem($id_pembeli, $id_produk);
            if ($row) {
                // Tambah quantity
                $newQty = $row['quantity'] + $quantity;
                $this->cartModel->updateQuantity($id_pembeli, $id_produk, $newQty);
            } else {
                // Tambah baru
                $this->cartModel->addOrUpdate($id_pembeli, $id_produk, $quantity);
            }
        }
        header('Location: index.php?c=cart');
        exit;
    }

    // Update kuantitas
    public function updateQuantity()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user']['id'])) {
            $productId = $_POST['product_id'];
            $action = $_POST['action'];
            $cart = $this->cartModel->getCartByUser($_SESSION['user']['id']);
            $currentQty = 1;
            foreach ($cart as $store) {
                foreach ($store['items'] as $item) {
                    if ($item['id'] == $productId) {
                        $currentQty = $item['quantity'];
                        break 2;
                    }
                }
            }
            if ($action === 'increase') $currentQty++;
            if ($action === 'decrease' && $currentQty > 1) $currentQty--;
            $this->cartModel->updateQuantity($_SESSION['user']['id'], $productId, $currentQty);
        }
        header('Location: cart.php');
        exit;
    }

    // Hapus item
    public function remove()
    {
        if (!isset($_SESSION['user']['id'])) {
            header('Location: index.php?c=auth&a=login');
            exit;
        }
        $id_pembeli = $_SESSION['user']['id'];
        $id_produk = $_POST['id_produk'] ?? null;
        if ($id_produk) {
            $this->cartModel->remove($id_pembeli, $id_produk);
        }
        header('Location: index.php?c=cart');
        exit;
    }
}
?>
<?php
require_once 'core/Controller.php';
require_once 'models/Product.php';

class HomeController extends Controller
{
    public function index()
    {
        $productModel = new Product();
        $produk = $productModel->getLatest(8); // Ambil 8 produk terbaru
        $this->view('home/index', ['produk' => $produk]);
    }
}
?>
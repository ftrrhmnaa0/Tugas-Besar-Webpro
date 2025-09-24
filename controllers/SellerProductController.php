<?php
require_once 'core/Controller.php';
require_once 'models/SellerProduct.php';

class SellerProductController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new SellerProduct();
    }

    // Tampilkan daftar produk
    public function index()
    {
        $sellerId = $_SESSION['seller']['id_toko'];
        $produk = $this->model->getAll($sellerId);
        $this->view('dashboard/products', ['produk' => $produk]);
    }

    // Proses tambah produk
    public function add()
    {
        $sellerId = $_SESSION['seller']['id_toko'];
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Upload gambar
            $imageName = '';
            if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
                $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
                $imageName = uniqid('prod_') . '.' . $ext;
                move_uploaded_file($_FILES['gambar']['tmp_name'], 'assets/images/products/' . $imageName);
            }
            // Siapkan data sesuai field database
            $data = [
                'nama_produk' => $_POST['nama_produk'],
                'harga'      => $_POST['harga'],
                'stok'       => $_POST['stok'],
                'satuan'     => $_POST['satuan'] ?? null,
                'statusPro'  => $_POST['statusPro'],
                'id_kat'     => $_POST['id_kat']
            ];
            if ($this->model->add($sellerId, $data, $imageName)) {
                header('Location: index.php?c=dashboard&a=products');
                exit;
            } else {
                $error = 'Gagal menambah produk!';
            }
        }
        $this->view('dashboard/add_products', ['error' => $error]);
    }

    // Proses hapus produk
    public function delete()
    {
        $sellerId = $_SESSION['seller']['id_toko'];
        $error = '';
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($this->model->delete($sellerId, $id)) {
                header('Location: index.php?c=dashboard&a=products');
                exit;
            } else {
                $error = 'Gagal menghapus produk!';
            }
        } else {
            $error = 'ID produk tidak ada!';
        }
        $produk = $this->model->getAll($sellerId);
        $this->view('dashboard/products', ['error' => $error, 'produk' => $produk]);
    }

    // Halaman edit produk
    public function edit()
    {
        $sellerId = $_SESSION['seller']['id_toko'];
        $error = '';
        $produk = null;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $produk = $this->model->getById($sellerId, $id);
            if (!$produk) {
                $error = 'Produk tidak ditemukan!';
            }
        } else {
            $error = 'ID produk tidak ada!';
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $produk) {
            // Siapkan data sesuai field database
            $data = [
                'id_kat'      => $_POST['id_kat'],
                'statusPro'   => $_POST['statusPro'],
                'satuan'      => $_POST['satuan'] ?? null,
                'stok'        => $_POST['stok'],
                'harga'       => $_POST['harga'],
                'nama_produk' => $_POST['nama_produk'],
            ];
            if ($this->model->update($sellerId, $data, $_POST['id'])) {
                header('Location: index.php?c=dashboard&a=products');
                exit;
            } else {
                $error = 'Gagal mengupdate produk!';
            }
        }

        $this->view('dashboard/edit_products', ['error' => $error, 'produk' => $produk]);
    }
}
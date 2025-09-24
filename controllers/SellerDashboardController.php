<?php
require_once 'core/Controller.php';
require_once 'models/SellerDashboard.php';
require_once 'models/SellerProduct.php';
require_once 'models/Kategori.php';

class SellerDashboardController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new SellerDashboard();
    }

    public function index()
    {
        $id_toko = $_SESSION['seller']['id_toko'];
        // Ambil data toko/penjual
        $stmt = $this->model->getDb()->prepare("SELECT nama_toko FROM toko WHERE id_toko = ?");
        $stmt->execute([$id_toko]);
        $toko = $stmt->fetch(PDO::FETCH_ASSOC);

        // Ambil summary dashboard (misal: total penjualan, pendapatan, produk aktif)
        $summary = $this->model->getSummary($id_toko);

        $this->view('dashboard/index', [
            'nama_toko' => $toko['nama_toko'] ?? '-',
            'summary'   => $summary
        ]);
    }

    public function addProduct()
    {
        $kategoriModel = new Kategori();
        $kategoriList = $kategoriModel->getAll();

        $error = $success = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama_produk = trim($_POST['nama_produk'] ?? '');
            $id_kat = trim($_POST['id_kat'] ?? '');
            $harga = intval($_POST['harga'] ?? 0);
            $stok = intval($_POST['stok'] ?? 0);
            $satuan = trim($_POST['satuan'] ?? '');
            $statusPro = trim($_POST['statusPro'] ?? 'Tidak Aktif');
            $id_toko = $_SESSION['seller']['id_toko'];

            // Upload gambar
            $gambar = null;
            if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
                $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
                $namaFile = uniqid('prd_') . '.' . $ext;
                $tujuan = 'assets/images/products/' . $namaFile;
                if (move_uploaded_file($_FILES['gambar']['tmp_name'], $tujuan)) {
                    $gambar = $namaFile;
                } else {
                    $error = 'Upload gambar gagal!';
                }
            }

            if (!$error) {
                $model = new SellerProduct();
                $model->add($id_toko, [
                    'nama_produk' => $nama_produk,
                    'harga' => $harga,
                    'stok' => $stok,
                    'satuan' => $satuan,
                    'statusPro' => $statusPro,
                    'id_kat' => $id_kat
                ], $gambar);
                $success = 'Produk berhasil ditambahkan!';
            }
        }
        $this->view('dashboard/add_products', [
            'kategoriList' => $kategoriList
        ]);
    }

    public function products()
    {
        $sellerId = $_SESSION['seller']['id_toko'];
        $model = new SellerProduct();
        $produk = $model->getAll($sellerId);

        // Ambil semua kategori
        $kategoriModel = new Kategori();
        $kategoriList = $kategoriModel->getAll();
        $kategoriMap = [];
        foreach ($kategoriList as $kat) {
            $kategoriMap[$kat['id_kat']] = $kat['nama_kat'];
        }

        $this->view('dashboard/products', [
            'produk' => $produk,
            'kategoriMap' => $kategoriMap
        ]);
    }

    // Untuk edit produk
    public function edit_product()
    {
        $sellerId = $_SESSION['seller']['id_toko'];
        $model = new SellerProduct();
        $kategoriModel = new Kategori();

        $error = '';
        $produk = null;

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $produk = $model->getById($sellerId, $id);
            if (!$produk) {
                $error = 'Produk tidak ditemukan!';
            }
        } else {
            $error = 'ID produk tidak ada!';
        }

        $kategoriList = $kategoriModel->getAll();

        // Proses update jika POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $produk) {
            $nama_produk = trim($_POST['nama_produk'] ?? '');
            $id_kat = trim($_POST['id_kat'] ?? '');
            $harga = intval($_POST['harga'] ?? 0);
            $stok = intval($_POST['stok'] ?? 0);
            $satuan = trim($_POST['satuan'] ?? '');
            $statusPro = trim($_POST['statusPro'] ?? 'Tidak Aktif');

            // Handle gambar
            $gambar = $produk['gambar'];
            if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
                $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
                $namaFile = uniqid('prd_') . '.' . $ext;
                $tujuan = 'assets/images/products/' . $namaFile;
                if (move_uploaded_file($_FILES['gambar']['tmp_name'], $tujuan)) {
                    $gambar = $namaFile;
                } else {
                    $error = 'Upload gambar gagal!';
                }
            }

            if (!$error) {
                $model->updateFull($sellerId, [
                    'nama_produk' => $nama_produk,
                    'harga' => $harga,
                    'stok' => $stok,
                    'satuan' => $satuan,
                    'statusPro' => $statusPro,
                    'id_kat' => $id_kat,
                    'gambar' => $gambar
                ], $produk['id_produk']);
                header('Location: index.php?c=dashboard&a=products');
                exit;
            }
        }

        $this->view('dashboard/update_products', [
            'error' => $error,
            'produk' => $produk,
            'kategoriList' => $kategoriList
        ]);
    }

    // Untuk hapus produk
    public function delete_product()
    {
        $sellerId = $_SESSION['seller']['id_toko'];
        $model = new SellerProduct();
        $error = '';
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($model->delete($sellerId, $id)) {
                header('Location: index.php?c=dashboard&a=products');
                exit;
            } else {
                $error = 'Gagal menghapus produk!';
            }
        } else {
            $error = 'ID produk tidak ada!';
        }
        // Redirect ke daftar produk dengan pesan error jika gagal
        header('Location: index.php?c=dashboard&a=products&error=' . urlencode($error));
        exit;
    }
}
?>
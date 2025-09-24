<?php
require_once 'core/Controller.php';
require_once 'models/Product.php';

class ProductController extends Controller {
    private $productModel;
    
    public function __construct() {
        $this->productModel = new Product();
    }
    
    public function index() {
        $products = $this->productModel->getAll();
        $categories = $this->productModel->getCategories();
        
        $this->view('products/index', [
            'products' => $products,
            'categories' => $categories
        ]);
    }
    
    public function category() {
        $category = isset($_GET['cat']) ? $_GET['cat'] : '';
        $products = $this->productModel->getByCategory($category);
        $categories = $this->productModel->getCategories();
        
        $this->view('products/category', [
            'products' => $products,
            'categories' => $categories,
            'current_category' => $category
        ]);
    }
    
    public function search() {
        $query = isset($_GET['q']) ? $_GET['q'] : '';
        $products = $this->productModel->search($query);
        
        $this->view('products/search', [
            'products' => $products,
            'query' => $query
        ]);
    }
}

?>
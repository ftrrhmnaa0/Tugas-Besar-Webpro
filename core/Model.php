<?php
require_once __DIR__ . '/../config/database.php';

class Model {
    protected $db;
    
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    
    public function getDb() {
        return $this->db;
    }
    
    // Helper method untuk generate ID unik
    protected function generateId($prefix = '', $length = 8) {
        return $prefix . str_pad(rand(1, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);
    }
    
    // Helper method untuk upload file
    protected function uploadFile($file, $uploadDir = 'assets/images/products/') {
        if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
            return null;
        }
        
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        
        if (!in_array($ext, $allowedTypes)) {
            return false;
        }
        
        $fileName = uniqid('img_') . '.' . $ext;
        $targetPath = $uploadDir . $fileName;
        
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            return $fileName;
        }
        
        return false;
    }
}
?>
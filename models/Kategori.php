<?php
require_once 'core/Model.php';

class Kategori extends Model
{
    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM kategori");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
<?php
require_once 'core/Model.php';

class Cart extends Model
{
    // Ambil isi keranjang user, dikelompokkan per toko
    public function getCartByUser($id_pembeli)
    {
        $stmt = $this->db->prepare("
            SELECT 
                c.id as cart_id, 
                c.quantity, 
                p.id_produk as product_id, 
                p.nama_produk as product_name, 
                p.gambar as image, 
                t.id_toko, 
                t.nama_toko as store_name
            FROM cart c
            JOIN produk p ON c.id_produk = p.id_produk
            JOIN toko t ON p.id_toko = t.id_toko
            WHERE c.id_pembeli = ?
            ORDER BY t.nama_toko, p.nama_produk
        ");
        $stmt->execute([$id_pembeli]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Kelompokkan per toko
        $cart = [];
        foreach ($rows as $row) {
            $cart[$row['store_name']]['store_name'] = $row['store_name'];
            $cart[$row['store_name']]['items'][] = [
                'id' => $row['product_id'],
                'product_name' => $row['product_name'],
                'image' => $row['image'],
                'quantity' => $row['quantity']
            ];
        }
        return array_values($cart);
    }

    // Tambah/update item ke keranjang
    public function addOrUpdate($id_pembeli, $id_produk, $quantity)
    {
        // Cek apakah sudah ada
        $stmt = $this->db->prepare("SELECT id FROM cart WHERE id_pembeli = ? AND id_produk = ?");
        $stmt->execute([$id_pembeli, $id_produk]);
        if ($stmt->fetch()) {
            $stmt = $this->db->prepare("UPDATE cart SET quantity = ? WHERE id_pembeli = ? AND id_produk = ?");
            return $stmt->execute([$quantity, $id_pembeli, $id_produk]);
        } else {
            $stmt = $this->db->prepare("INSERT INTO cart (id_pembeli, id_produk, quantity) VALUES (?, ?, ?)");
            return $stmt->execute([$id_pembeli, $id_produk, $quantity]);
        }
    }

    // Hapus item dari keranjang
    public function remove($id_pembeli, $id_produk)
    {
        $stmt = $this->db->prepare("DELETE FROM cart WHERE id_pembeli = ? AND id_produk = ?");
        return $stmt->execute([$id_pembeli, $id_produk]);
    }

    // Update kuantitas
    public function updateQuantity($id_pembeli, $id_produk, $quantity)
    {
        $stmt = $this->db->prepare("UPDATE cart SET quantity = ? WHERE id_pembeli = ? AND id_produk = ?");
        return $stmt->execute([$quantity, $id_pembeli, $id_produk]);
    }

    public function getCartItem($id_pembeli, $id_produk)
{
    $stmt = $this->db->prepare("SELECT quantity FROM cart WHERE id_pembeli = ? AND id_produk = ?");
    $stmt->execute([$id_pembeli, $id_produk]);
    return $stmt->fetch();
}
}
?>
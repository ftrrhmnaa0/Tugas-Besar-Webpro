<?php
require_once 'core/Model.php';

class Order extends Model
{
    // Simpan pesanan baru
    public function create($userId, $recipient, $phone, $address, $payment, $notes, $items, $shipping = 25000)
    {
        try {
            $this->db->beginTransaction();

            // Hitung subtotal
            $subtotal = 0;
            foreach ($items as $item) {
                $subtotal += $item['price'] * $item['quantity'];
            }
            $total = $subtotal + $shipping;

            // Simpan order
            $stmt = $this->db->prepare("INSERT INTO orders (user_id, recipient_name, phone, address, payment_method, notes, subtotal, shipping, total, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
            $stmt->execute([$userId, $recipient, $phone, $address, $payment, $notes, $subtotal, $shipping, $total]);
            $orderId = $this->db->lastInsertId();

            // Simpan detail order
            $stmtDetail = $this->db->prepare("INSERT INTO order_items (order_id, product_id, product_name, price, quantity) VALUES (?, ?, ?, ?, ?)");
            foreach ($items as $item) {
                $stmtDetail->execute([$orderId, $item['id'], $item['name'], $item['price'], $item['quantity']]);
            }

            // Hapus keranjang user
            $stmt = $this->db->prepare("DELETE FROM cart WHERE user_id = ?");
            $stmt->execute([$userId]);

            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
            return false;
        }
    }

    // Ambil ringkasan keranjang user
    public function getCartSummary($userId)
    {
        $stmt = $this->db->prepare("
            SELECT c.product_id as id, p.name, p.price, p.image, c.quantity
            FROM cart c
            JOIN products p ON c.product_id = p.id
            WHERE c.user_id = ?
        ");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
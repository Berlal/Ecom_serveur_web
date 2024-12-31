<?php

class OrderController {
    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'];
            $firstName = $_POST['first_name'];
            $lastName = $_POST['last_name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            $db = new Database();
            $db->query("INSERT INTO orders (product_id, first_name, last_name, email, message) VALUES (?, ?, ?, ?, ?)", [
                $productId, $firstName, $lastName, $email, $message
            ]);
            echo "Commande enregistrée";
        } else {
            $db = new Database();
            $products = $db->query("SELECT * FROM products")->fetchAll();
            include 'views/order.php';
        }
    }
}
?>
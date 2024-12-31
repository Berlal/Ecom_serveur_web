<?php

class HomeController {
    public function index() {
        $db = new Database();
        $product = $db->query("SELECT * FROM products ORDER BY created_at DESC LIMIT 1")->fetch();
        include 'views/home.php';
    }
}
?>
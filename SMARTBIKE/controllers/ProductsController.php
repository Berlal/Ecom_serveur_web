<?php

class ProductsController {
    public function index() {
        $db = new Database();
        $products = $db->query("SELECT * FROM products")->fetchAll();
        include 'views/products.php';
    }

    public function detail($id) {
        $db = new Database();
        $product = $db->query("SELECT * FROM products WHERE id = ?", [$id])->fetch();
        include 'views/productDetail.php';
    }
}
?>
<?php
class ContactController {
    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstName = $_POST['first_name'];
            $lastName = $_POST['last_name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            $db = new Database();
            $db->query("INSERT INTO contacts (first_name, last_name, email, message) VALUES (?, ?, ?, ?)", [
                $firstName, $lastName, $email, $message
            ]);
            echo "Message envoyé";
        } else {
            include 'views/contact.php';
        }
    }
}
?>

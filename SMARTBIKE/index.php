<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$page = $_GET['page'] ?? 'home'; 
include('views/header.php');



$file = "views/{$page}.php";
if (file_exists($file)) {
    include($file);  
} else {
    echo "Page not found";  // Affiche un message si la page n'existe pas
}

include('views/footer.php');
?>



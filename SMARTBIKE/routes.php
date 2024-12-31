<?php
require_once 'config/database.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/ProductsController.php';
require_once 'controllers/OrderController.php';
require_once 'controllers/ContactController.php';

$page = $_GET['page'] ?? 'accueil'; // page par défaut

switch ($page) {
    case 'accueil':
        (new HomeController())->index(); 
        break;
    case 'produits':
        (new ProductsController())->index(); // Liste des vélos
        break;
    case 'commander':
        (new OrderController())->index(); // Page de commande
        break;
    case 'contact':
        (new ContactController())->index(); // Page de contact
        break;
    case 'productDetail':
        $productId = $_GET['velo'] ?? null; // ID du vélo sélectionné
        if ($productId) {
            (new ProductsController())->detail($productId); // Détails d'un vélo spécifique
        }
        break;
    default:
        echo "Page introuvable";
        break;
}
?>

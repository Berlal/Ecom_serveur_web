<?php
// Démarrer la session pour gérer le panier
session_start();

// Vérifier si un vélo a été sélectionné
if (!isset($_GET['id'])) {
    echo "Aucun produit sélectionné.";
    exit;
}

// Récupérer l'ID du produit
$product_id = intval($_GET['id']);

// Vérifier si le panier existe dans la session, sinon le créer
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = []; // Initialisation du panier comme un tableau
}

// Ajouter le produit au panier
if (!in_array($product_id, $_SESSION['panier'])) {
    $_SESSION['panier'][] = $product_id; // Ajout de l'ID au panier
}

// Rediriger vers la page panier
header("Location: ?page=panier&success=1");
exit;
?>

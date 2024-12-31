<?php
session_start();

$host = 'localhost';
$dbname = 'smartbike';
$username = 'smartbike';
$password = 'smartbike';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

$products_in_cart = [];
if (!empty($_SESSION['panier'])) {
    $placeholders = implode(',', array_fill(0, count($_SESSION['panier']), '?'));
    $query = "SELECT * FROM products WHERE id IN ($placeholders)";
    $stmt = $pdo->prepare($query);
    $stmt->execute($_SESSION['panier']);
    $products_in_cart = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre panier</title>
    <link rel="stylesheet" href="../assets/css/panier.css">
</head>
<body>
    <main>
        <h2>Votre panier</h2>

        <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
            <p class="success-message">Produit ajouté au panier avec succès !</p>
        <?php endif; ?>

        <?php if (!empty($products_in_cart)): ?>
            <ul class="cart-list">
                <?php foreach ($products_in_cart as $product): ?>
                    <li class="cart-item">
                    <img src="../assets/images/velo.png/" alt="<?php echo $product['name']; ?>" class="product-image">
                    <h3><?php echo $product['name']; ?></h3>
                        <p>Prix : <?php echo number_format($product['price'], 2); ?> €</p>
                        <a href="?page=removeFromCart&id=<?php echo $product['id']; ?>" class="btn btn-remove">Retirer</a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <a href="?page=checkout" class="btn btn-checkout">Passer à la caisse</a>
        <?php else: ?>
            <p>Votre panier est vide.</p>
        <?php endif; ?>
    </main>
</body>
</html>

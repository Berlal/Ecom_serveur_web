<?php
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

$query = "SELECT * FROM products";  // Pas de limitation, on récupère tous les produits
$stmt = $pdo->prepare($query);
$stmt->execute();

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);  
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous les vélos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main>
        <section class="search-filter">
            <input type="text" id="search" placeholder="Rechercher un vélo..." onkeyup="filterProducts()" class="search-input">
            <select id="categoryFilter" onchange="filterProducts()" class="category-select">
                <option value="">Filtrer par catégorie</option>
                <option value="Route">Route</option>
                <option value="VTT">VTT</option>
                <option value="Ville">Ville</option>
            </select>
        </section>

        <section class="products">
            <h2>Tous les vélos</h2>
            <div class="product-list" id="productList">
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <div class="product-card" data-name="<?php echo strtolower($product['name']); ?>" data-category="<?php echo strtolower($product['category']); ?>">
                            <img src="../assets/images/velo.png/" alt="<?php echo $product['name']; ?>" class="product-image">
                            <h3 class="product-name"><?php echo $product['name']; ?></h3>
                            <p class="product-price">Prix : <?php echo number_format($product['price'], 2); ?> €</p>
                            <div class="product-buttons">
                            <a href="?page=productDetail&id=<?php echo $product['id']; ?>" class="btn btn-info">Plus d'infos</a>
                            <a href="?page=commander&id=<?php echo $product['id']; ?>" class="btn btn-order">Commander</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Aucun produit trouvé.</p>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <script src="script.js"></script>
</body>
</html>

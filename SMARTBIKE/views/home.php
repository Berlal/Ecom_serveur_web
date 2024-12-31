<?php
// Connexion à la base de données PostgreSQL
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

// Récupérer le dernier produit ajouté
$query = "SELECT * FROM products ORDER BY id DESC LIMIT 1";
$stmt = $pdo->prepare($query);
$stmt->execute();

$product = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartBike - Accueil</title>
    <link rel="stylesheet" href="home.css">
    <script src="home.js" defer></script>
</head>

<body>

    

    <section id="accueil" class="hero">
        <div class="hero-content">
            <h1>Bienvenue chez SmartBike</h1>
            <p>Découvrez nos vélos électriques de qualité supérieure</p>
            <a href="#produits" class="btn">Voir nos produits</a>
        </div>
    </section>

    <section id="produits" class="produits">
        <h2>Nos derniers produits</h2>

        <?php if ($product): ?>
        <div class="product-card">
            <h3><?php echo htmlspecialchars($product['name']); ?></h3>
            <p>Prix : <?php echo number_format($product['price'], 2, ',', ' ') . ' €'; ?></p>
            <p>Catégorie : <?php echo htmlspecialchars($product['category']); ?></p>
            <a href="#" class="btn">Voir ce produit</a>
        </div>
        <?php else: ?>
        <p>Aucun produit trouvé.</p>
        <?php endif; ?>
    </section>

  
</body>

</html>

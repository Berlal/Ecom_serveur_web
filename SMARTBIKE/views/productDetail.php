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

$product_id = $_GET['id'] ?? null;

if ($product_id) {
    $query = "SELECT * FROM products WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $product_id, PDO::PARAM_INT);
    $stmt->execute();

    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        echo "Produit introuvable.";
        exit;
    }
} else {
    echo "Aucun produit sélectionné.";
    exit;
}
?>

<section class="product-detail">
    <h1><?php echo htmlspecialchars($product['name']); ?></h1>
    <img src="../assets/images/velo.png/" alt="<?php echo $product['name']; ?>" class="product-image">
    <p class="description"><?php echo htmlspecialchars($product['description']); ?></p>
    <p class="price">Prix : <?php echo number_format($product['price'], 2, ',', ' '); ?> €</p>
    <p class="category">Catégorie : <?php echo htmlspecialchars($product['category']); ?></p>
    <a href="?page=commander&id=<?php echo $product['id']; ?>" class="btn">Commander</a>
</section>

<style>
.product-detail {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.product-detail h1 {
    font-size: 2.5rem;
    margin-bottom: 20px;
    color: #333;
}

.product-detail img.product-image {
    max-width: 100%;
    height: auto;
    margin-bottom: 20px;
    border-radius: 10px;
}

.product-detail .description {
    font-size: 1.2rem;
    margin-bottom: 20px;
    color: #555;
}

.product-detail .price {
    font-size: 1.5rem;
    font-weight: bold;
    color: #4caf50;
    margin-bottom: 20px;
}

.product-detail .category {
    font-size: 1rem;
    color: #777;
    margin-bottom: 30px;
}

.product-detail .btn {
    padding: 15px 30px;
    background-color: #4caf50;
    color: white;
    font-weight: bold;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.product-detail .btn:hover {
    background-color: #45a049;
}
</style>

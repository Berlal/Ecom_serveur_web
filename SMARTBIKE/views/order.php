<form method="POST" action="">
    <label for="product">Choisir un vélo :</label>
    <select name="product_id" id="product">
        <?php foreach ($products as $product): ?>
            <option value="<?php echo $product['id']; ?>"><?php echo $product['name']; ?></option>
        <?php endforeach; ?>
    </select><br>
    <input type="text" name="first_name" placeholder="Prénom" required><br>
    <input type="text" name="last_name" placeholder="Nom" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <textarea name="message" placeholder="Message" required></textarea><br>
    <button type="submit">Envoyer</button>
</form>

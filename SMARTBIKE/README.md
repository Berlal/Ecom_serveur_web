# Projet E-Commerce de Vélos - Documentation

Ce projet est une application web simple permettant de parcourir une liste de vélos, d’afficher les détails de chaque produit, et de les ajouter à un panier pour un achat futur. Le projet inclut les fonctionnalités de navigation entre différentes pages, gestion des produits via une base de données PostgreSQL, et manipulation des données en PHP.

## Structure du Projet

Le projet suit une structure simple avec des fichiers et dossiers organisés comme suit :

```
.
├── index.php
├── views/
│   ├── header.php
│   ├── footer.php
│   ├── products.php
│   ├── productDetail.php
│   ├── panier.php
├── css/
│   └── styles.css
├── images/
│   └── (images des produits)
├── scripts/
│   └── script.js
├── database/
│   └── init.sql
```

### Détails des Fichiers

- **`index.php`\*\*** :\*\* Point d’entrée principal de l’application. Il inclut automatiquement le header, le footer, et la page demandée via `$_GET['page']`.
- **Dossier \*\***`views/`\***\* :** Contient toutes les pages du site web.
  - `header.php` et `footer.php` : Contiennent les parties communes à toutes les pages.
  - `products.php` : Affiche tous les produits disponibles.
  - `productDetail.php` : Affiche les détails d’un produit sélectionné.
  - `panier.php` : Affiche le panier avec les produits ajoutés par l’utilisateur.
- **Dossier \*\***`css/`\***\* :** Contient le fichier de styles pour toute l’application.
- **Dossier \*\***`images/`\***\* :** Contient les images associées aux produits.
- **Dossier \*\***`scripts/`\***\* :** Contient les fichiers JavaScript pour les fonctionnalités dynamiques.
- **Dossier \*\***`database/`\***\* :** Contient le script de création de la base de données PostgreSQL.

## Installation et Configuration

1. **Clôner le projet :**

   ```bash
   git clone <url-du-repo>
   cd <nom-du-dossier>
   ```

2. **Configurer la base de données PostgreSQL :**

   - Créer une base de données nommée `smartbike`.
   - Exécuter le script `init.sql` situé dans le dossier `database/` pour créer la table `products` et y insérer des données de test.

   ```bash
   psql -U <nom_utilisateur> -d smartbike -f database/init.sql
   ```

3. **Configurer les paramètres de connexion dans chaque page PHP utilisant la base de données :**
   Assurez-vous que les valeurs suivantes correspondent à votre configuration PostgreSQL :

   ```php
   $host = 'localhost';
   $dbname = 'smartbike';
   $username = 'smartbike';
   $password = 'smartbike';
   ```

4. **Déployer localement :**
   Utilisez un serveur local comme XAMPP, WAMP, ou un serveur PHP natif :

   ```bash
   php -S localhost:8000
   ```

5. **Accéder à l’application :**
   Ouvrez un navigateur et accédez à [http://localhost:8000](http://localhost:8000).

## Fonctionnalités

1. **Page d’accueil (\*\***`products.php`\***\*) :**

   - Affiche tous les produits disponibles sous forme de cartes.
   - Les utilisateurs peuvent cliquer sur "Plus d'infos" pour voir les détails d’un produit ou "Commander" pour l’ajouter au panier.

2. **Page de détails (\*\***`productDetail.php`\***\*) :**

   - Affiche les informations détaillées du produit : nom, image, description, catégorie et prix.
   - Propose un bouton pour ajouter le produit au panier.

3. **Page panier (\*\***`panier.php`\***\*) :**

   - Affiche les produits ajoutés au panier.
   - Permet de retirer un produit du panier.
   - Affiche le prix total des produits ajoutés.

## Base de Données

### Schéma de la table `products`

```sql
CREATE TABLE products (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    category VARCHAR(100) NOT NULL,
    image VARCHAR(255) NOT NULL
);
```

### Exemples de données

```sql
INSERT INTO products (name, description, price, category, image) VALUES
('Vélo de Route', 'Idéal pour les amateurs de vitesse.', 1200.00, 'Route', 'velo_route.jpg'),
('VTT Montagne', 'Parfait pour les terrains accidentés.', 1500.00, 'VTT', 'vtt_montagne.jpg'),
('Vélo de Ville', 'Confortable et élégant pour la vie urbaine.', 800.00, 'Ville', 'velo_ville.jpg');
```

## Améliorations Futures

- Ajouter un système de paiement.
- Implémenter un système de connexion utilisateur.
- Optimiser l’interface utilisateur pour une meilleure expérience mobile.
- Ajouter des tests unitaires pour la validation des fonctionnalités.

##

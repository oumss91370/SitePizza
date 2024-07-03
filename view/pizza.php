<link rel="stylesheet"  href="style.css">

<nav>
    <div class="nav-content">
        <div class="logo-position">
            <div class="logo-img">
                <img src="img/estd1975.gif" alt="logo" >
            </div>
        </div>
        <div class="nav-buttons">

            <a class="nav-button" href="index.php?action=displayMenu">Menu</a>
            <a class="nav-button" href="index.php?objet=Produit&action=displayAll">Nos Produits</a>
            <a class="nav-button" href="index.php?objet=Panier&action=displayAll">Mon Panier</a>
        </div>
    </div>
</nav>
<h1>Nos Pizza</h1>
<ul class="ul-pizza">
    <div class="container">
        <?php foreach ($tableau as $unElement): ?>
            <div class="pizza-item">
                <div class="pizza-img" >
                    <img src="<?php  $imagePath = 'img/imgPizza/' . $unElement->getIdPizza() . '.jpg'; echo file_exists($imagePath) ? $imagePath : 'img/imgPizza/default.jpg'; ?>" alt="<?php echo $unElement->getNomPizza(); ?>">
                </div >
                <h2><?= $unElement->getNomPizza() ?></h2>
                <p><?= $unElement->getDescriptionPizza() ?></p>
                <p class="prix"><?= $unElement->getPrixPizza() ?> €</p>
                <a class="btn" href="index.php?objet=Commande&action=createPanier&idPizza=<?= $unElement->getIdPizza() ?>" class="bouton-panier">Ajouter au panier</a>
            </div>
        <?php endforeach; ?>
    </div>
</ul>
</body>
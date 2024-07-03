
<nav>
    <div class="nav-content">
        <div class="logo-position">
            <div class="logo-img">
                <img src="img/estd1975.gif" alt="logo" >
            </div>
        </div>
        <div class="nav-buttons">
            <a class="nav-button" href="index.php?action=displayMenu">Menu</a>
            <a class="nav-button" href="index.php?objet=Pizza&action=displayAll">Nos Pizza</a>
            <a class="nav-button" href="index.php?objet=Panier&action=displayAll">Mon Panier</a>
        </div>
</nav>
<h1>Nos Produits</h1>
<ul class="ul-pizza">
    <div class="container">
        <?php foreach ($tableau as $unElement): ?>
            <div class="pizza-item">
                <div class="pizza-img">
                    <img src="img\imgProduit/<?php echo $unElement->getIdProduit(); ?>.jpg" alt="<?php echo $unElement->getNomProduit(); ?>" >
                </div>
                <h2><?= $unElement->getNomProduit() ?></h2>
                <p class="prix"><?= $unElement->getPrixProduit() ?> €</p>
                <a class="btn" href="index.php?objet=Commande&action=createPanier&idPizza=<?= $unElement->getIdProduit() ?>">Ajouter au panier</a>
            </div>
        <?php endforeach; ?>
    </div>
</ul>
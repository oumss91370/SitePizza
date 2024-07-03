<link rel="stylesheet"  href="cs/tab.css">

<nav>
    <div class="nav-content">
        <div class="logo-position">
            <div class="logo-img">
                <img src="img/estd1975.gif" alt="logo" >
            </div>
        </div>
        <div class="nav-buttons">

                <a class="nav-button" href="index.php?action=displayGestionnaire">Acceuil</a>
                <a class="nav-button" href="index.php?objet=Statistique&action=displayAll">Statistiques</a>
                <a class="nav-button" href="index.php?objet=Stock&action=displayStock">Stock</a>
                <a class="nav-button" href="index.php?objet=Alerte&action=displayAll">Alerte</a>
        </div>
    </div>
</nav>
    <h1>Les Pizza</h1> 
    <ul class="ul-pizza">
    <div class="container">
        <?php foreach ($tableau as $unElement): ?>
            <div class="pizza-item">
            <div class="pizza-img" >
                    <img src="<?php  $imagePath = 'img/imgPizza/' . $unElement->getIdPizza() . '.jpg'; echo file_exists($imagePath) ? $imagePath : 'img/imgPizza/default.jpg'; ?>" alt="<?php echo $unElement->getNomPizza(); ?>">
                </div >
                <h2><?= $unElement->getNomPizza() ?></h2>
                <p><?= $unElement->getDescriptionPizza() ?></p>
                <p><?= $unElement->getIdPizza() ?></p>
                <p class="prix"><?= $unElement->getPrixPizza() ?> €</p>
                <a class="btn" href="index.php?objet=est_composer&action=displayCreationForm&idPizza=<?= $unElement->getIdPizza() ?>">Ajouter des ingrédients</a>
            </div>
        <?php endforeach; ?>
    </div>
    </ul>
 </body>
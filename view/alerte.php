
<nav>
    <div class="nav-content">
        <div class="logo-position">
            <div class="logo-img">
                <img src="img/estd1975.gif" alt="logo" >
            </div>
        </div>
        <div class="nav-buttons">
            <a class="nav-button"  href="index.php?action=displayGestionnaire">Acceuil</a>
            <a class="nav-button" href="index.php?objet=Statistique&action=displayAll">Statistique</a>
            <a class="nav-button" href="index.php?objet=Stock&action=displayStock">Stock</a>
        </div>
</nav>

    </div>
    <h1>Alerte</h1> 
    <ul>
    <div class="container">
        <?php foreach ($tableau as $unElement): ?>
            <div class="pizza-item">
                <h2><?= $unElement->getIdAlerte() ?></h2>
                <p><?= $unElement->getDescAlerte() ?></p>
            </div>
        <?php endforeach; ?>
    </div>
    </ul>
    


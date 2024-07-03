<nav>
    <div class="nav-content">
        <div class="logo-position">
            <div class="logo-img">
                <img src="img/estd1975.gif" alt="logo" >
            </div>
        </div>
        <div class="nav-buttons">

            <a class="nav-button" href="index.php?action=displayGestionnaire">Acceuil</a>
            <a class="nav-button" href="index.php?objet=Stock&action=displayStock">Stock</a>
            <a class="nav-button" href="index.php?objet=Alerte&action=displayAll">Alerte</a>
        </div>
    </nav>
    <h1>Statistique</h1> 
    <ul>
    <div class="container">
        <?php foreach ($tableau as $unElement): ?>
            <div class="pizza-item">
                <h2><?= $unElement->getNomStat() ?></h2>
                <p><?= $unElement->getCA() ?>€</p>
                
            </div>
        <?php endforeach; ?>
    </div>
    </ul>
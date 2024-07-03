<nav>
    <div class="nav-content">
        <div class="logo-position">
            <div class="logo-img">
                <img src="img/estd1975.gif" alt="logo" >
            </div>
        </div>
        <div class="nav-buttons">

            <a class="nav-button" href="index.php?action=displayGestionnaire">Acceuil</a>
            <a class="nav-button" href="index.php?objet=Statistique&action=displayAll">Statistique</a>
            <a class="nav-button" href="index.php?objet=Alerte&action=displayAll">Alerte</a>
        </div>
	</nav>
    <h1>Stock</h1> 
    <ul>
    <div class="container">

    <?php

    $previousIdStock = null;

    foreach ($tableau2 as $unElement2):

        if ($unElement2->getIdStock() !== $previousIdStock) {

            if ($previousIdStock !== null) {

                echo '</div>'; // Close the previous row

            }

            echo '<div class="pizza-item">';

            echo '<h2>' . $unElement2->getNomIngredient() . '</h2>';

            $previousIdStock = $unElement2->getIdStock();

        }

        ?>

        <?php foreach ($tableau as $unElement): ?>

            <?php if ($unElement2->getIdStock() === $unElement->getIdStock()): ?>
                <p><?php echo $unElement->getIdStock(); ?></p>
                <p><?php echo $unElement->getQuantiteStock(); ?></p>
               

            <?php endif; ?>

        <?php endforeach; ?>

    <?php endforeach; ?>

    <?php if ($previousIdStock !== null): ?>

        </div>

    <?php endif; ?>

</ul>
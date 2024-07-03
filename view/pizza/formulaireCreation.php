<nav>
        <div class="nav-content">
            <div class="logo-position">
                <div class="logo-img">
                    <img src="img/estd1975.gif" alt="logo" >
                </div>
            </div>
            <div class="nav-buttons">
                <a class="nav-button" href="index.php?action=displayGestionnaire">Accueil</a>
                <a class="nav-button" href="index.php?objet=Pizza&action=displayPizza">Les Pïzza</a>
                <a class="nav-button" href="index.php?objet=Statistique&action=displayAll">Statistiques</a>
                <a class="nav-button" href="index.php?objet=Stock&action=displayStock">Stock</a>
                <a class="nav-button" href="index.php?objet=Alerte&action=displayAll">Alerte</a>


            </div>
    </nav>
<main>
    <form action="index.php" method="get">
        <input type="hidden" name="objet" value="Pizza">
        <input type="hidden" name="action" value="create">
        <div>
            <label for="idPizza">id de la Pizza</label>
            <input type="text" name="idPizza" placeholder="l'id de la pizza" required>
        </div>
        <div>
            <label for="nomPizza">nom</label>
            <input type="text" name="nomPizza" placeholder="le nom de la pizza" required>
        </div>
        <div>
            <label for="prixPizza">prix</label>
            <input type="text" name="prixPizza" placeholder="le prix de la pizza" required>
        </div>
        <div>
            <label for="descriptionPizza">description de la Pizza</label>
            <input type="text" name="descriptionPizza" placeholder="description de la pizza" required>
        </div>


        <button type="submit">créer</button>
    </form>
</main>
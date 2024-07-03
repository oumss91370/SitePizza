<nav>
        <div class="nav-content">
            <div class="logo-position">
                <div class="logo-img">
                    <img src="img/estd1975.gif" alt="logo" >
                </div>
            </div>
            <div class="nav-buttons">
                <a class="nav-button" href="index.php?action=displayGestionnaire">Accueil</a>
                <a class="nav-button" href="index.php?objet=Pizza&action=displayPizza">Les Pizza</a>
                <a class="nav-button" href="index.php?objet=Statistique&action=displayAll">Statistiques</a>
                <a class="nav-button" href="index.php?objet=Stock&action=displayStock">Stock</a>
                <a class="nav-button" href="index.php?objet=Alerte&action=displayAll">Alerte</a>


            </div>
    </nav>
<main>
    <form action="saes3-sazdad/PizzaVfinal/view/est_composer/traitement_pizza.php" method="post"> <!-- Assurez-vous que action correspond à votre script de traitement PHP -->
        <div>
            <label for="idPizza">ID de la Pizza</label>
            <input type="text" id="idPizza" name="idPizza" placeholder="ID de la pizza" required>
        </div>
        <div>
            <strong>Choisir les ingrédients :</strong><br>
            <?php
            $ingredients = Ingredient::getAllIngredients();
            foreach ($ingredients as $ingredient) {
                echo "<div><input type='checkbox' id='ingredient" . $ingredient->getIdIngredient() . "' name='ingredients[]' value='" . $ingredient->getIdIngredient() . "'>";
                echo "<label for='ingredient" . $ingredient->getIdIngredient() . "'>" . $ingredient->getNomIngredient() . "</label></div>";
            }
            ?>
        </div>
        <div>
            <label for="quantiteIngredient">Quantité de l'ingrédient (sera appliquée à tous les ingrédients sélectionnés)</label>
            <input type="number" id="quantiteIngredient" name="quantiteIngredient" placeholder="Quantité" min="1" required>
        </div>
        <button type="submit">Créer</button>
    </form>
</main>
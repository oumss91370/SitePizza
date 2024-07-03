
<link rel="stylesheet" href="css/stylePanier.css">
</head>
<body>
<nav>
    <div class="nav-content">
        <div class="logo-position">
            <div class="logo-img">
                <img src="img/estd1975.gif" alt="logo">
            </div>
        </div>
        <div class="nav-buttons">
            <a class="nav-button" href="index.php?action=displayMenu">Menu</a>
            <a class="nav-button" href="index.php?objet=Commande&action=createCommande">Nos Pizza</a>
            <a class="nav-button" href="index.php?objet=Produit&action=displayAll">Nos Produits</a>
            <a class="nav-button" href="index.php?objet=Panier&action=displayAll">Mon Panier</a>
        </div>
    </div>
</nav>
<main>
    <h1>Mon Panier</h1>
    <ul  class="ul-pizza">
        <div class="container">
            <?php
            // Inclure les fichiers nécessaires
            require_once("model/Panier.php");
            require_once("model/Pizza.php");

            // Récupérer les éléments du panier
            $panierItems = Panier::getAll();

            // Parcourir chaque élément du panier
            $total=0;
            foreach ($panierItems as $item) {
                // Récupérer la pizza correspondante
                $pizza = Pizza::getOne($item->getIdPizza());
                $total+= $pizza->getPrixPizza();

                // Afficher les informations de la pizza
                echo '<div class="panier-item">';
                echo '<h2>' . $pizza->getNomPizza() . '</h2>';
                echo '<p>' . $pizza->getDescriptionPizza() . '</p>';
                echo '<p class="prix">' . $pizza->getPrixPizza() . ' €</p>';
$lienSupprimer = "<a class='btn' href='index.php?objet=$classe&action=delete&$identifiant={$pizza->getIdPizza()}'>SUPPRIMER</a>";
echo "<tr><td>$lienSupprimer</td></tr>";
                echo '</div>';
            }
            echo '</div>';
            echo '<div class="total">';
            echo '<div class="payment-button">';
            echo "<a href='index.php?objet=Paiement&action=displayCreationForm&montantPaiement=$total'>Procéder au paiement</a>";
            echo '</div>';
            echo "<p> Total : $total €</p>"; // Utilisation de l'interpolation de chaîne pour insérer la variable $total
            echo '</div>';


            ?>


    </ul>
</main>
</body>
</html>
<link rel="stylesheet" href="css/stylePayment.css">

<div class="contactez-nous">
    <h1>Informations de la carte</h1>
    <form action="index.php?objet=Payment&action=createPayment" method="post">
        <div>
            <label for="nom">Nom sur la carte</label>
            <input type="text" id="nom" name="nom" placeholder="Nom" required>
        </div>
        <div>
            <label for="cardNumber">Numéro de la carte</label>
            <input type="text" id="cardNumber" name="cardNumber" placeholder="3471 4496 3539 8431" required>
        </div>
        <div>
            <label for="expiryDate">Date d'expiration</label>
            <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/AA" pattern="\d{4}" title="Entrer une date valide au format MM/AA" maxlength="4" required>
        </div>
        <div>
            <label for="cvv">CVV</label>
            <input type="text" id="cvv" name="cvv" placeholder="123" pattern="\d{3}" title="Entrer 3 chifres valides" maxlength="3" required>

        </div>
        <?php
        // Inclure les fichiers nécessaires
        require_once("model/Panier.php");
        require_once("model/Pizza.php");
        $panierItems = Panier::getAll();

        // Parcourir chaque élément du panier
        $total=0;
        foreach ($panierItems as $item) {
        // Récupérer la pizza correspondante
        $pizza = Pizza::getOne($item->getIdPizza());
        $total+= $pizza->getPrixPizza();

        // Afficher les informations de la pizza

        }
        echo "Total de la commande: ".$total."$";
        ?>
    <input type="submit" value="Submit">
        <div>
    </form>

</div>
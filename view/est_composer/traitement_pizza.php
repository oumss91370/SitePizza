<?php
require_once("/../../config/connexion.php"); // Assurez-vous que ce fichier contient les informations de connexion à votre base de données
require_once("Ingredient.php");
require_once("est_composer.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $idPizza = $_POST['idPizza'];
    $idsIngredients = isset($_POST['ingredients']) ? $_POST['ingredients'] : array();
    $quantiteIngredient = $_POST['quantiteIngredient'];

    // Validation basique (à améliorer pour une meilleure sécurité et gestion d'erreurs)
    if (!empty($idPizza) && is_array($idsIngredients) && !empty($idsIngredients) && !empty($quantiteIngredient)) {
        // Appel de la méthode pour insérer les ingrédients de la pizza
        est_composer::insererIngredientsPizza($idPizza, $idsIngredients, $quantiteIngredient);

        // Redirection ou message de succès
        echo "Les ingrédients ont été ajoutés avec succès à la pizza ID: $idPizza";
        // Vous pouvez rediriger vers une autre page si nécessaire
        // header('Location: success_page.php');
    } else {
        echo "Erreur : Données du formulaire invalides.";
    }
} else {
    // Si le formulaire n'a pas été soumis via POST, afficher une erreur
    echo "Erreur : Méthode de requête non autorisée.";
}

// Ajoutez une gestion d'erreur plus robuste selon vos besoins

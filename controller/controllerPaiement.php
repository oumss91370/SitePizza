<?php
require_once ("model/Paiement.php");
require_once ("controllerObjet.php");

class controllerPaiement extends controllerObjet {
    protected static $classe = "Paiement";
    protected static $identifiant = "idPaiement";

    public static function displayCreationForm() {
        $title = "création Paiement";
        include("view/payment/formulaireCreation.php");
    }

public static function createPayment() {
    // Récupérer les données du formulaire
    $modePaiement = isset($_POST['modePaiement']) ? $_POST['modePaiement'] : null;
    $montantPaiement = isset($_POST['montantPaiement']) ? $_POST['montantPaiement'] : null;
    $numeroCarte = isset($_POST['numeroCarte']) ? $_POST['numeroCarte'] : null;

    // Créer un nouvel objet Payment
    $payment = new Payment(NULL, $modePaiement, $montantPaiement, $numeroCarte);

    // Insérer l'objet Payment dans la base de données
    $payment->create();

    // Rediriger l'utilisateur vers la page appropriée
    header("Location: index.php?objet=Payment&action=displayAll");
    exit();
}










}






?>
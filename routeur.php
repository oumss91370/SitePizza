<?php
require_once("model/session.php");

$objet ="Client";
$objets = ["Pizza","Produit","Client","Stock","Ingredient","Alerte","Statistique","est_composer","Panier","Commande","Paiement"];
if(isset($_GET["objet"])&& in_array($_GET["objet"],$objets)){
  $objet= $_GET["objet"];
}
$objet2 = "Ingredient";

$action ="displayMenu";
$actions = ["displayAll","displayOne","displayMenu","displayConnectionForm","delete", "connect", "disconnect","displayStock","displayGestionnaire","create","createPizza","displayCreationForm","displayPizza","displayPaymentForm","createCommande","createPanier","createPaiement"];


  // test pour savoir si un objet correct est passé dans l'url
  if (isset($_GET["objet"]) && in_array($_GET["objet"], $objets)) {
    // si c'est le cas, récupération de l'objet passé dans l'url
    $objet = $_GET['objet'];
  }
  // test pour savoir si une action correcte est passée dans l'url
  if (isset($_GET["action"]) && in_array($_GET["action"], $actions)) {
    // si c'est le cas, récupération de l'action passés dans l'url
    $action = $_GET["action"];
  }
  if (isset($_POST["action"]) && in_array($_POST["action"], $actions)) {
    // si c'est le cas, récupération de l'action passés dans l'url
    $action = $_POST["action"];
  }


require_once("controller/controllerObjet.php");
$controller = "controller".ucfirst($objet);
$controller2 = "controller".ucfirst($objet2);
require_once("controller/$controller.php");
require_once("controller/$controller2.php");
require_once("config/connexion.php");

connexion::connect();
$controller::$action();
?>


    

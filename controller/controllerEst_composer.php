<?php
require_once("model/est_composer.php");
require_once("controllerObjet.php");

class controllerEst_composer extends controllerObjet{
     protected static $classe = "est_composer";
     protected static $identifiant = "idPizza";


     public static function displayCreationForm() {
          $title = "création Pizza";
          $selectIngredient = Ingredient::getSelect();
          include("view/debut.php");
          include("view/est_composer/formulaireCreation.php");
          include("view/fin.php");
      }

}



?>
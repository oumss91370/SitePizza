<?php
require_once("model/Pizza.php");
require_once("controllerObjet.php");

class controllerPizza extends controllerObjet{
     protected static $classe = "Pizza";
     protected static $identifiant = "idPizza";


     public static function displayCreationForm() {
          $title = "création Pizza";
          $selectIngredient = Ingredient::getSelect();
          include("view/debut.php");
          include("view/pizza/formulaireCreation.php");
          include("view/fin.php");
      }
}



?>
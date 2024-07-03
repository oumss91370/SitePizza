<?php
require_once("Objet.php");

class Ingredient extends Objet {

    protected static $classe = "Ingredient";
    protected static $identifiant = "idIngredient";
    protected $idIngredient;
    protected $nomIngredient;
    protected $est_allergene;
    protected $idStock;
    protected static $tableauSelect = array("Ingredient", "idIngredient");
   
   
    public function __construct($idIngredient = NULL,$nomIngredient = NULL,$est_allergene = NULL,$idStock = NULL) {
        if(!is_null($idIngredient)) {
            $this->idIngredient = $idIngredient;
            $this->nomIngredient = $nomIngredient;
            $this->$est_allergene = $est_allergene;
            $this->$idStock = $idStock;

        }
    }
    public function getIdStock() {
        return $this->idStock;
    }
    public function getidIngredient(){
        return $this -> idIngredient;
    }

    public function getNomIngredient() {
        return $this->nomIngredient;
    }

    public static function getAllIngredients() {
        $requete = 'SELECT * FROM ' . static::$classe;
        $resultat = connexion::pdo()->query($requete);
        return $resultat->fetchAll(PDO::FETCH_CLASS, static::$classe);
    }

    
   
}

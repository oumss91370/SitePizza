<?php
require_once("Objet.php");

class Pizza extends Objet {

    protected static $classe = "Pizza";
    protected static $identifiant ="idPizza";
    protected $idPizza;
    protected $nomPizza;
    protected $prixPizza;
    protected $descriptionPizza;
   
    public function __construct($idPizza = NULL, $nomPizza = NULL, $prixPizza = NULL, $descriptionPizza =  NULL) {
        if(!is_null($idPizza)) {
            $this->idPizza = $idPizza;
            $this->nomPizza = $nomPizza;
            $this->prixPizza = $prixPizza;
            $this->descriptionPizza = $descriptionPizza;
        }
    }

    public function __toString(){
        $chaine = "pizza $this->nomPizza";
        return $chaine;
    }

    public function getIdPizza() {
        return $this->idPizza;
    }

    public function getNomPizza() {
        return $this->nomPizza;
    }

    public function getPrixPizza() {
        return $this->prixPizza;
    }

    public function getDescriptionPizza() {
        return $this->descriptionPizza;
    }
}

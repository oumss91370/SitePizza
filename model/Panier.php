<?php
require_once("Objet.php");

class Panier extends Objet {

    protected static $classe = "Panier";
    protected static $identifiant = "idPizza";
    protected $idPizza;
    protected $idProduit;
    protected $idCommande;
    protected $quantitePizza;
    protected $quantiteProduit;
   
    public function __construct($idCommande = NULL,$idPizza = NULL, $idProduit = NULL , $quantitePizza =  NULL, $quantiteProduit =  NULL) {
        if(!is_null($idCommande) && !is_null($idPizza)) {
            $this->idCommande = $idCommande;
            $this->idProduit = $idProduit;
            $this->idPizza = $idPizza;
            $this->$quantitePizza = $quantitePizza;
            $this->$quantiteProduit = $quantiteProduit;
        }
    }

    public function getIdPizza() {
        return $this->idPizza;
    }


}

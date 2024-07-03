<?php
require_once("Objet.php");

class Stock extends Objet {

    protected static $classe = "Stock";
    protected static $identifiant = "idStock";
    protected $idStock;
    protected $quantiteStock;
   
   
    public function __construct($idStock = NULL,$quantiteStock = NULL) {
        if(!is_null($idStock)) {
            $this->idStock = $idStock;
            $this->quantiteStock = $quantiteStock;
        }
    }
    public function getIdStock() {
        return $this->idStock;
    }

    public function getQuantiteStock() {
        return $this->quantiteStock;
    }

    
   
}

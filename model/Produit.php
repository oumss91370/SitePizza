<?php
require_once("Objet.php");

class Produit extends Objet{

    protected static $classe = "Produit";
    protected static $identifiant = "idProduit";
    protected $idProduit;
    protected $nomProduit;
    protected $prixProduit;

        public function __construct($idProduit = NULL, $nomProduit = NULL, $prixProduit = NULL) {
            if(!is_null($idProduit)){
            $this->idProduit = $idProduit;
            $this->nomProduit = $nomProduit;
            $this->prixProduit = $prixProduit;
            }
        }

        public function __toString(){
            $chaine = "produit $this->nomProduit";
            return $chaine;
        }

        public function getIdProduit() {
            return $this->idProduit;
        }
    
        public function getNomProduit() {
            return $this->nomProduit;
        }
    
        public function getPrixProduit() {
            return $this->prixProduit;
        }
    
    }
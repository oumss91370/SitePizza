<?php
require_once("Objet.php");

class Commande extends Objet {

    protected static $classe = "Commande";
    protected static $identifiant = "idCommande";
    protected $idCommande;
    protected $dateCommande;
    protected $idPaiement;
    protected $idLivreur;
    protected $idClient;
    protected $est_pret;
   
    public function __construct($idCommande = NULL,$dateCommande = NULL, $idPaiement = NULL,$idClient =  NULL, $idLivreur =  NULL, $est_pret = NULL) {
        if(!is_null($idCommande)) {
            $this->idCommande = $idCommande;
            $this->idPaiement = $idPaiement;
            $this->dateCommande = $dateCommande;
            $this->$idLivreur = $idLivreur;
            $this->$idClient = $idClient;
            $this->est_pret = $est_pret;

        }
    }
    
    
   
}

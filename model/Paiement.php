<?php
require_once ("Objet.php");

class Paiement extends Objet {
    protected static $classe = "Paiement";
    protected static $identifiant = "idPaiement";
    protected $idPaiement;
    protected $modePaiement;
    protected $montantPaiement;
    protected $numeroCarte;

    public function __construct($idPaiement = NULL, $modePaiement = NULL, $montantPaiement = NULL, $numeroCarte = NULL) {
        if (!is_null($idPaiement)) {
            $this->idPaiement = $idPaiement;
            $this->modePaiement = $modePaiement;
            $this->montantPaiement = $montantPaiement;
            $this->numeroCarte = $numeroCarte;
        }
    }
    public function getIdPaiement() {
        return $this->idPaiement;
    }
    public function getModePaiement() {
        return $this->modePaiement;
    }
    public function getMontantPaiement() {
        return $this->montantPaiement;
    }
    public function getNumeroCarte() {
        return $this->numeroCarte;
    }
}


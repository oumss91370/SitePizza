<?php
require_once("Objet.php");

class Alerte extends Objet {

    protected static $classe = "Alerte";
    protected static $identifiant = "idAlerte";
    protected $idAlerte;
    protected $nomAlerte;
    protected $descriptionAlerte;
   
   
    public function __construct($idAlerte = NULL,$nomAlerte = NULL,$descriptionAlerte = NULL) {
        if(!is_null($idAlerte)) {
            $this->idAlerte = $idAlerte;
            $this->nomAlerte = $nomAlerte;
            $this->descriptionAlerte = $descriptionAlerte;
        }
    }
    public function getIdAlerte() {
        return $this->idAlerte;
    }

    public function getDescAlerte() {
        return $this->descriptionAlerte;
    }

    
   
}

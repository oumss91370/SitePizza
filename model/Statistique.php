<?php
require_once("Objet.php");

class Statistique extends Objet {

    protected static $classe = "Statistique";
    protected static $identifiant = "idStatistique";
    protected $idStatistique;
    protected $nomStatistique ;
    protected $chiffreAffaireAnnuel;
   
   
    public function __construct($idStatistique = NULL,$nomStatistique  = NULL,$chiffreAffaireAnnuel = NULL) {
        if(!is_null($idStatistique)) {
            $this->idStatistique = $idStatistique;
            $this->nomStatistique  = $nomStatistique ;
            $this->chiffreAffaireAnnuel = $chiffreAffaireAnnuel;
        }
    }
    public function getNomStat() {
        return $this->nomStatistique;
    }

    public function getCA() {
        return $this->chiffreAffaireAnnuel;
    }
 
}

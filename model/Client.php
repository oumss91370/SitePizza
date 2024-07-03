<?php
require_once("Objet.php");

class Client extends Objet {

    protected static $classe = "Client";
    protected static $identifiant = "idClient";
    protected $idClient;
    protected $nomClient;
    protected $prenomClient;
    protected $numeroTelephoneClient;
    protected $adresseClient;
    protected $mailClient;
    protected $isAdmin;
   
    public function __construct($idClient = NULL,$idPizza = NULL, $nomClient = NULL, $prenomClient = NULL, $numeroTelephoneClient =  NULL, $adresseClient =  NULL, $mailClient = NULL, int $isAdmin = NULL) {
        if(!is_null($idClient) ) {
            $this->idClient = $idClient;
            $this->nomClient = $nomClient;
            $this->prenomClient = $prenomClient;
            $this->$numeroTelephoneClient = $numeroTelephoneClient;
            $this->$adresseClient = $adresseClient;
            $this->$mailClient = $mailClient;
            $this->$isAdmin = $isAdmin;
        }
    }

    public static function checkMDP($l, $m) {
        // écriture de la requête
        $requetePreparee = "SELECT * FROM Client WHERE idClient = :idClient AND nomClient = :nomClient;";
        // envoi de la requête et stockage de la réponse dans une variable $resultat
        $resultat = connexion::pdo()->prepare($requetePreparee);
        // on crée le tableau contenant le tag et sa valeur
        $tags = array("idClient" => $l, "nomClient" => $m);
        try {
          // on exécute la requête préparée
          $resultat->execute($tags);
          // on interprète le résultat selon la classe récupérée
          $resultat->setFetchmode(PDO::FETCH_CLASS, "Client");
          // on récupère le tableau
          $tableau = $resultat->fetchAll();
          // on retourne lefait que $tableau soit oui ou non de taille 1
          return sizeof($tableau) == 1;
        } catch(PDOException $e) {
          echo $e->getMessage();
        }
      }

      public function isAdmin() {
        return ($this->isAdmin == 1);
      }
   
}
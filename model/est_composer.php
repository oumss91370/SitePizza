<?php
require_once("Objet.php");

class est_composer extends Objet {

    protected static $classe = "est_composer";
    protected static $identifiant ="idPizza";
    protected $idPizza;
    protected $idIngredient;
    protected $quantiteIngredient;
   
   
    public function __construct($idPizza = NULL, $idIngredient = NULL, $quantiteIngredient = NULL,) {
        if(!is_null($idPizza)) {
            $this->idPizza = $idPizza;
            $this->idIngredient = $idIngredient;
            $this->quantiteIngredient = $quantiteIngredient;
            
        }
    }

    public function __toString(){
        $chaine = "pizza $this->nomPizza";
        return $chaine;
    }

    public function getIdPizza() {
        return $this->idPizza;
    }

    public function getIdIngredient() {
        return $this->idIngredient;
    }

    public function getQuan() {
        return $this->quantiteIngredient;
    }

    public function getQuantiteIngredient() {
        return $this->quantiteIngredient;
    }

    public static function create($donnees) {
        // on récupère le nom de la table
        $classeRecuperee = static::$classe;
        // on commence à construire la requête
        $requetePreparee = "INSERT INTO $classeRecuperee(";
        // on récupère le tableau des clés de $donnees
        $cles = array_keys($donnees);
        // on récupère le nombre de clés, ce sera utile
        $nbCles = count($cles);
        // pour chaque clé de $donnees (sauf la dernière), 
        // on concatère la chaîne "`$cle`," au bout de $requetePreparee. 
        for($i = 0; $i < $nbCles - 1; $i++) {
          $cle = $cles[$i];   
          $requetePreparee .= "`$cle`,";
        }
        // Attention, pour la dernière clé, on concatènera 
        // la chaîne "`$cle`) VALUES(" : pas la dernière virgule, 
        // mais le début des values 
        $cle = $cles[$nbCles - 1];
        $requetePreparee .= "`$cle`) VALUES(";
        // on ajoute maintenant les values. ATTENTION : des TAGS !!!
        for($i = 0; $i < $nbCles - 1; $i++) {
          $cle = $cles[$i]; 
          $requetePreparee .= ":$cle,"; // le tag aura pour nom le même que la clé
        }
        $cle = $cles[$nbCles - 1];
        $requetePreparee .= ":$cle);";
        // on finit le travail classiquement
        $resultat = connexion::pdo()->prepare($requetePreparee);
        try {
          // on exécute la requête préparée
          $resultat->execute($donnees);
        } catch(PDOException $e) {
          echo $e->getMessage();
        }
      }

    public static function insererIngredientsPizza($idPizza, $idsIngredients, $quantite) {
        $pdo = connexion::pdo();
        $requete = 'INSERT INTO est_composer (idPizza, idIngredient, quantiteIngredient) VALUES (:idPizza, :idIngredient, :quantiteIngredient)';

        foreach ($idsIngredients as $idIngredient) {
            try {
                $stmt = $pdo->prepare($requete);
                $stmt->execute([
                    ':idPizza' => $idPizza,
                    ':idIngredient' => $idIngredient,
                    ':quantiteIngredient' => $quantite
                ]);
            } catch(PDOException $e) {
                // Gérer l'erreur ici (log l'erreur, afficher un message, etc.)
                error_log('Erreur lors de l\'insertion : ' . $e->getMessage());
            }
        }
    }

}

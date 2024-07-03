<?php

class Objet{
    public function get($attribut){return $this->$attribut;}
    public function set($attribut,$valeur) : void{$this->$attribut=$valeur;}

    public static function getAll(){
         $classeRecuperee = static::$classe;
         //echo "<p>$classeRecuperee</p>";
         $requete = "SELECT * FROM  $classeRecuperee;";
         $resultat = connexion::pdo()->query($requete);
         $resultat->setFetchmode(PDO::FETCH_CLASS,$classeRecuperee);
         $tableau= $resultat->fetchAll();
         return  $tableau;
    }
    public static function getOne($id) {
        // on récupère le nom de la table
        $classeRecuperee = static::$classe;
        // on récupère le nom de l'identifiant
        $identifiant = static::$identifiant;
        // on construit la requête préparée avec un tag qui 
        // remplace la valeur de l'identifiant
        $requetePreparee = "SELECT * FROM $classeRecuperee WHERE $identifiant = :id_tag;";
        // on lance la méthode "prepare" et on récupère le résultat
        $resultat = connexion::pdo()->prepare($requetePreparee);
        // on crée le tableau contenant le tag et sa valeur
        $tags = array("id_tag" => $id);
        try {
          // on exécute la requête préparée
          $resultat->execute($tags);
          // on interprète le résultat selon la classe récupérée
          $resultat->setFetchmode(PDO::FETCH_CLASS, $classeRecuperee);
          // on récupère l'élément
          $element = $resultat->fetch();
          // on le retourne
          return $element;
        } catch(PDOException $e) {
          echo $e->getMessage();
        }
      }

    public static function createCommande($donnees) {
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

    public static function getSelect() {
      // récupération des static essentiels
      $classe = static::$classe;
      $identifiant = static::$identifiant;
      $tableauSelect = static::$tableauSelect;
      // on récupère la valeur de l'attribut name du select
      $name = $tableauSelect[0];
      // construction de la requête qui récupère les éléments pour le select
      // on considère qu'il y a un ou au plus 2 champs à afficher
      $nb = count($tableauSelect);
      // en fonction de $nbChamps, la construction de l'affichage est différente 
      $champ1 = $tableauSelect[1];
      if ($nb == 2) {
        $requete = "SELECT $identifiant, $champ1 FROM $classe;";
      } else {
        $champ2 = $tableauSelect[2];
        $requete = "SELECT $identifiant, concat($champ1,', ',$champ2) FROM $classe;";
      }
      $resultat = connexion::pdo()->query($requete);
      $resultat->setFetchmode(PDO::FETCH_NUM);
      $tableau = $resultat->fetchAll();
      // construction de la balise <select> à partir du tableau  
      // 1. indication du name  
      $baliseSelect = "<select name=\"$name\" required>";
      // 2. balise <option> pour annoncer le choix
      $baliseSelect .= "<option selected disabled>choisissez</option>";
      // 3. parcours du tableau, dont chaque ligne contient en élément 0 la valeur de l'identifiant
      //    et en élément 1 la valeur de l'affichage correspondant
      foreach($tableau as $ligne) {
        $valeur = $ligne[0];
        $affichage = $ligne[1];
        // 4. ajout de la balise <option pour cette ligne  
        $baliseSelect .= "<option value='$valeur'>$affichage</option>";
      }
      // 5. on ferme la balise select
      $baliseSelect .= "</select>";
      // on retourne la balise fabriquée
      return $baliseSelect;
    }
    public static function delete($id) {
        // on récupère le nom de la table
        $classeRecuperee = static::$classe;
        // on récupère le nom de l'identifiant
        $identifiant = static::$identifiant;
        // on construit la requête préparée avec un tag qui
        // remplace la valeur de l'identifiant
        $requetePreparee = "DELETE FROM $classeRecuperee WHERE $identifiant = :id_tag;";
        // on lance la méthode "prepare" et on récupère le résultat
        $resultat = connexion::pdo()->prepare($requetePreparee);
        // on crée le tableau contenant le tag et sa valeur
        $tags = array("id_tag" => $id);
        try {
            // on exécute la requête préparée
            $resultat->execute($tags);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}
<?php
require_once("model/Commande.php");
require_once ("model/Panier.php");
require_once ("model/Paiement.php");
require_once ("controllerClient.php");
// ... rest of your code

class controllerObjet
{

    public static function displayMenu()
    {
        include("view/debut.php");
        include("view/accueil.php");
        include("view/fin.php");
    }

    public static function displayGestionnaire()
    {
        include("view/debut.php");
        include("view/gestionnaire.php");
        include("view/fin.php");
    }

    public static function displayStock()
    {
        $classe = static::$classe;
        $identifiant = static::$identifiant;
        $title = "les {$classe}s";
        $tableau = $classe::getAll();
        $tableau2 = Ingredient::getAll();
        $cl = strtolower($classe);
        include("view/debut.php");
        include("view/$cl.php");
        include("view/fin.php");
    }

    public static function displayAll()
    {
        $classe = static::$classe;
        $identifiant = static::$identifiant;
        $title = "les {$classe}s";
        $tableau = $classe::getAll();
        $cl = strtolower($classe);
        include("view/debut.php");
        include("view/$cl.php");
        include("view/fin.php");
    }
    public static function  genererId($taille = 10) {
        $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $chaineAleatoire = '';

        for ($i = 0; $i < $taille; $i++) {
            $index = rand(0, strlen($caracteres) - 1);
            $chaineAleatoire .= $caracteres[$index];
        }

        return $chaineAleatoire;
    }

    public static function displayPizza()
    {
        $classe = static::$classe;
        $identifiant = static::$identifiant;
        $title = "les {$classe}s";
        $tableau = $classe::getAll();
        $cl = strtolower($classe);
        include("view/debut.php");
        include("view/tabPizza.php");
        include("view/fin.php");
    }


    public static function displayOne()
    {
        $classe = static::$classe;
        $title = "un(e) $classe";
        $identifiant = static::$identifiant;
        $unidentifiant = $_GET[$identifiant];
        include("view/debut.php");
        $element = $classe::getOne($unidentifiant);
        include("view/fin.php");

    }


    public static function createCommande(){
    $classe = static::$classe; //objet
    $idCommande = "CMD40";
    $dateCommande = date('Y-m-d H:i:s');
    $donnees = array(
        'idCommande' => $idCommande,
        'dateCommande' => $dateCommande,
        'idPaiement' => NULL,
        'idClient' => $_SESSION["idClient"],
        'idLivreur' => "L1",
        'est_pret' => 0

    );
    $classe::create($donnees);
    header("Location: index.php?objet=Pizza&action=displayAll");
    exit();
    }


   public static function createPanier(){
    // Récupérer l'ID de la pizza à partir de la requête GET, ou null si non fourni
    $idPizza = isset($_GET['idPizza']) ? htmlspecialchars($_GET['idPizza']) : null;

    $idProduit = "PS1";
    $idCommande ="CMD40";

    // Récupérer la quantité de la pizza et du produit à partir de la requête GET, ou 1 si non fourni
    $quantitePizza = 1;
    $quantiteProduit = 1;

    // Ajouter la pizza et le produit sélectionnés au panier
    $donnees = array(
        'idPizza' => $idPizza,
        'idCommande' => $idCommande,
        'idProduit' => $idProduit,
        'quantiterPizza' => $quantitePizza,
        'quantiterProduit' => $quantiteProduit
    );
    // Appeler la méthode 'create' de la classe 'Panier' pour créer un nouvel élément dans le panier
    Panier::create($donnees);

    // Rediriger l'utilisateur vers la page de la pizza
    header("Location: index.php?objet=Pizza&action=displayAll");
}
    public static function create()
    {
        $classe = static::$classe;
        $donnees = array();
        foreach ($_GET as $cle => $valeur)
            if ($cle != "objet" && $cle != "action")
                $donnees[$cle] = $valeur;
        $classe::create($donnees);
        self::displayGestionnaire();
    }

    public static function createPizza()
    {
        $classe = static::$classe;
        $donnees = array();
        $donnees["idPizza"] = isset($_GET['idPizza']) ? htmlspecialchars($_GET['idPizza']) : null;
        print_r($donnees[idPizza]);
        // $classe::create($donnees);
        self::displayGestionnaire();
    }
    public static function delete() {
        $classe = static::$classe;
        $identifiant = static::$identifiant;
        $title = "supprimer un(e) {$classe}";
        $id = $_GET[$identifiant];
        $classe::delete($id);
        header("Location: index.php?objet=Panier&action=displayAll");
    }

    public static function createPaiement(){
        $classe = static::$classe;
        $donnees = array();
        $id = self::genererId(10);
        $montantPaiement = isset($_GET['montantPaiement']) ? htmlspecialchars($_GET['montantPaiement']) : null;
        $modePaiement = isset($_GET['modePaiement']) ? htmlspecialchars($_GET['modePaiement']) : null;
        $numeroCarte = isset($_GET['numeroCarte']) ? htmlspecialchars($_GET['numeroCarte']) : null;
        $donnees = array(
            'idPaiement' => $id,
            'modePaiement' => $modePaiement,
            'montantPaiement' => $montantPaiement,
            'numeroCarte' => "2222111100009999" 	,
        );
        $classe::create($donnees);
        header("Location:view/succes.php");
    }

}
?>
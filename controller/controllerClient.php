<?php
require_once("model/Client.php");
require_once("controllerObjet.php");

class controllerClient extends controllerObjet{
     protected static $classe = "Client";
     protected static $identifiant = "idClient";


     public static function displayConnectionForm() {
        include("view/formulaireConnexion.html");
      
    }
    public static function connect() {
        $l = $_POST["idClient"];
        $m = $_POST["nomClient"];
        $b = Client::checkMDP($l, $m);
        if ($b) {
            $_SESSION["idClient"] = $l;
            $element = Client::getOne($l);
            $_SESSION["isAdmin"] = $element->isAdmin();
            include("view/debut.php");
            include(session::urlMenu());
            include("view/fin.php");
        } else {
            self::displayConnectionForm();
        }

    }

    public static function createClient() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nomClient = filter_input(INPUT_POST, 'nomClient', FILTER_SANITIZE_STRING);
            $prenomClient = filter_input(INPUT_POST, 'prenomClient', FILTER_SANITIZE_STRING);
            $numeroTelephoneClient = filter_input(INPUT_POST, 'numeroTelephoneClient', FILTER_SANITIZE_STRING);
            $adresseClient = filter_input(INPUT_POST, 'adresseClient', FILTER_SANITIZE_STRING);
            $mailClient = filter_input(INPUT_POST, 'mailClient', FILTER_SANITIZE_EMAIL);
            $isAdmin = filter_input(INPUT_POST, 'isAdmin', FILTER_VALIDATE_INT);
            if (!empty($nomClient) && !empty($prenomClient) && !empty($numeroTelephoneClient) && !empty($adresseClient) && !empty($mailClient) && ($isAdmin === 0 || $isAdmin === 1)) {
                $client = new Client(NULL, $nomClient, $prenomClient, $numeroTelephoneClient, $adresseClient, $mailClient, $isAdmin);
                echo "Client created successfully";
            } else {
                echo "Invalid input data";
            }
        } else {
            include("view/formulaireCreationClient.html");
        }
    }



    public static function disconnect() {
        session_unset();
        session_destroy();
        setcookie(session_name(), '', time()-1);
        controllerObjet::displayMenu();
    }

}
?>
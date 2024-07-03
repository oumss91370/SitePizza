<?php
class session {
    
    public static function ClientConnected() {
    
        return isset($_SESSION["idClient"]) ;
    }

    public static function adminConnected() {
        return isset($_SESSION["idClient"]) && isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == 1;
    }

    public static function ClientConnecting() {
        return isset($_POST["action"]) && $_POST["action"] == "connect";
    }

    public static function urlMenu() {
        if (self::adminConnected()) {
            return "view/gestionnaire.php";
        } else {
            return "view/accueil.php";
        }
    }

}
//ajouter dans la base de donner la parie is admin
?>
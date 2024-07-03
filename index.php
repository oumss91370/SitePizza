<?php
    // lancement d'une session, ou récupération de la session existante
    session_start();
    // affichage de la session courante
    /*
    echo "<pre>session courante : ";
    print_r($_SESSION);
    echo "</pre>";
    */
    // appel du routeur
    require_once("routeur.php");
?>

<?php
//Ouverture de la session
session_start();

/**
 * Déconnexion
 */
//Détruit la variable de session "user" 
unset($_SESSION['user']);

//Détruit toute les variable de session
session_unset();

//Détruit toute les sessions existantes
session_destroy();

//Redirection vers la page d'accueil
header('Location: index.php');

?>
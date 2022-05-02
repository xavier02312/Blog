<?php

//Démarage de session on le rappel à toute les pages admin
session_start();

//On vérifie si l'utilisateur à le droit d'accéder à la page
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'ROLE_ADMIN') {
    
         //Redirection vers le formulaire de connection
         header('Location: ../login.php');
 }
 
?>
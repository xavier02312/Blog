<?php
/**
 * Suprime un article
 */

 //Connection a la base de données
 require_once '../connexion.php';

 //Récupère et nettoie l'ID
 $id = htmlspecialchars(strip_tags($_GET['id']));

 //Supprime l' article via son ID
 $query = $db->prepare('DELETE FROM posts WHERE idpost = :idpost');
 $query->bindValue(':idpost', $idpost, PDO::PARAM_INT);
 $query->execute();

 //Si aucune ligne n'a été affecter par la suppression, on redirige vers une erreur 404
 if ($query->rowCount() === 0) {
     header('Location: ../404.php');
 }
 else {

    //Redirection vers  la page d'acceil de l'admin en cas de succès
    header('Location: index.php?successDelete=1');
 }
 
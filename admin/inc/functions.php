<?php

/**
 * Uploade de l'image
 * 
 * @param array $picture Contient la superglobale $_files
 * @param srting $path   Contient le chemin où sera téléversé le fichier
 * @param int $maxSize   Contien le poids maximum autorisé du fichier
 * 
 * @return array
 */
function uploadPicture(array $picture, string $path, int $maxSize = 1) : array {

    //poid max
    $maxSize *= 1048576;

    //type MIME acceptés
    $typeMime = [
        'jpg' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'gif' => 'image/gif',
        'png' => 'image/png'
    ];

    //Extention du fichier
    $ext = pathinfo(strtolower($picture['name']), PATHINFO_EXTENSION);

    //Vérification de l'extention du fichier
    if (array_key_exists($ext, $typeMime) && in_array($picture['type'], $typeMime)) {

        //Vérification du poid max. de l'image
        if ($picture['size'] <= $maxSize) {

            //Génère un nom unique pour l'image qui aurra pour nom l'heure au moment  [md5() ne pas utiliser pour un mots de passe]
            $newName = md5(time()) . ".$ext";

            //Upload de l'image
            move_uploaded_file($picture['tmp_name'], "$path/$newName" );

            //Retourne le nom de l'image
            return ['filename' => $newName];

        }
        else {
            return ['error' => 'Le poids de l\'image est trop lourd'];
        }
        
    }
    else {
        return ['error' => 'Ce fichier n\'est pas autorisé'];
    }

}
?>
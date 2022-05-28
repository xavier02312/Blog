<?php
//Vérifier si l'accès est autorisé
require_once 'checkAdmin.php';

//connexion à la base de données
require_once '../connexion.php';

//Chargement des dépendances
require_once '../vendor/autoload.php';

/**
 * Séléction de toutes les categories en base de données
 */
/**
 * Requête SQL
 */
$query = $db->query('SELECT * FROM category ORDER BY name');
$categories = $query->fetchAll();


/**
 * Déclaration des variable à null
 * Elle serviront à remplir le formulaire des données soumise
 * par l'utilisateur 
 */
$title = null;
$content = null;
$category = null;
$error = null;
/**
 * Si la superglobale $_post n'est pas vide, alors j'effectue les vérification nécessaires et 
 * l'insertion en BDD
 * 
 * En faisant le php direct sur le formulaire sa évite de refaire le formulaire sur le site 
 */
if (!empty($_POST)) {
    $title = htmlspecialchars(strip_tags($_POST['title']));
    $content = htmlspecialchars(strip_tags($_POST['content']));
    $category = htmlspecialchars(strip_tags($_POST['category']));

    /**
     * Vérifie que les champs soient bien remplis
     */
    if (!empty($title) && !empty($content) && !empty($category) && !empty($_FILES['cover']) && $_FILES['cover']['error'] === 0) {

        //Upload l'image sur le serveur
            require_once 'inc/functions.php';
            $upload = uploadPicture($_FILES['cover'], '../images/upload', 1);        
        //dump($upload);
        //Si la variable $upload ne contient la clé "error", alors on peut effectuer l'insertion en BDD   
        if (empty($upload['error'])) {
            
            $fileName = $upload['filename'];
            //Insertion en BDD
            $query = $db->prepare('INSERT INTO posts (user_id, category_id, title, content, cover, created_at) VALUES (1, :category_id, :title, :content, :cover, NOW())');

            $query->bindValue(':category_id', $category, PDO::PARAM_INT);
            $query->bindValue(':title', $title);
            $query->bindValue(':content', $content);
            $query->bindValue(':cover', $fileName);
            $query->execute();

            //Redirection de la page d'acceil de l'administration "?successAdd=1"
            header('Location: index.php?successAdd=1');

        }
        else {
            //Sinon, on transfère l'erreur à la variable "$error" pour l'afficher au dessus du formulaire
            $error = $upload['error'];
        }

    }
    else {
        $error = 'Tous les champs sont obligatoires';
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/mobilestyle.css">
    <link rel="stylesheet" href="../css/style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Philosophy. - Administration (Nouvel article)</title>
</head>
<body>
<header class="bg-dark py-4"> <!--on rajoute avec le site bootstrap du CSS-->
            <div class="container">
                <!--en tête-->
                <div class="row">
                  <!--ligne-->
                  <!--titre du site-->
                    <div class="col-6 col-lg-12 text-start text-lg-center">
                     <a href="index.php" title="Philosophy" class="text-white text-decoration-none h1 logo">
                        Philosophy.<span class="text-danger fs-4">Administration</span></a>
                    </div>
                      <!--menu burger-->
                    <div class="col-6 d-block d-lg-none text-end">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list text-white" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                          </svg>
                    </div>
                    <!--navigation-->
                    <div class="col-12 d-none d-lg-block">
                      <nav> 
                        <ul class="d-flex align-items-center justify-content-center gap-5 py-3">
                            <li class="nav-item">
                            <a href="../index.php" title="Go Blog" class="text-secondary text-decoration-none">Aller sur le Blog</a>
                            </li>
                            <li class="nav-item">
                            <a  href="index.php" title="menu Admin" class="text-secondary text-decoration-none">Menu Admin</a>
                            </li>
                        </ul>
                      </nav>
                    </div>
                </div> 
            </div>
        </header>
        <!--Dégrader-->
        <div class="gradient"></div>
    <main>                      
       <div class="container">        
                                <!---ne pas oublier "post"--->
            <form method="post" enctype="multipart/form-data">
                                  <!---Affichage d'une erreur--->
            <?php if ($error !== null): ?>
                <div class="alert alert-danger">
                    <?php echo $error; ?>
                </div>     
                <?php endif;?> 

                <div class="mb-3">
                        <label for="title" class="form-label">Titre</label>
                        <input type="text" class="form-control" value="<?php echo $title;?>" id="title" name="title">
                        
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Contenu</label>
                        <textarea class="form-control" id="content" name="content" rows="10"><?php echo $content; ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="cover" class="form-label">Image de couverture</label>
                    <input class="form-control" type="file" id="cover" name="cover">
                    <div id="coverHelpBock" class="form-text">
                        L'image ne doit pas dépasser les 1Mo

                    </div>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label"> Catégorie</label>

                            <select class="form-select" id="category" name="category">
                            <option>Choisir une catégorie</option>
                            <!---Liste des catégories--->
                            <?php foreach($categories as $categorie): ?>

                                <option value="<?php echo $categorie['idcat']?>"

                                <?php echo ($category !== null && $category == $categorie['idcat']) ? 'selected': null; ?>>
                                    <?php echo $categorie['name']?>

                                </option>
                            <?php endforeach; ?>                                   
                        </select>
                </div>
                <div>
                  
                    <button class="btn btn-success">Enregistrer l'article</button>
             </div>   
            </form>
        </div>
    </main>
    <footer class="bg-dark py-4">
            <div class="container">
                <p class="m-0 text-white text-center">&copy; Copyright Philosophy 2022</p>
            </div>
        </footer>
</body>
</html>
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

//Netoyage de la valeur reçue
$id = htmlspecialchars(strip_tags( $_GET['id']));

/**
 * Requête SQL
 */
$query = $db->prepare('SELECT posts.idpost, posts.title, posts.content, posts.category_id, posts.cover FROM posts WHERE posts.idpost = :idpost');
$query->bindValue(':idpost', $id, PDO::PARAM_INT);
$query->execute();

$article = $query->fetch();


/**
 * Déclaration des variable à null
 * Elle serviront à remplir le formulaire des données soumise
 * par l'utilisateur 
 */
$title = $article['title'];
$content = $article['content'];
$category = $article['category_id'];
$picture = $article['cover'];
$error = null;
$success = false;

/*En faisant le php direct sur le formulaire sa évite de refaire le formulaire sur le site 
 */

if (!empty($_POST)) {
   
    //Netoyage des données
    $title = htmlspecialchars(strip_tags($_POST['title']));
    $content = htmlspecialchars(strip_tags($_POST['content']));
    $category = htmlspecialchars(strip_tags($_POST['category']));


   //Vérifie que mes champs soient bien remplis
   if (!empty($title) && !empty($content) && !empty($category)) {


    //Est-ce que je reçois une image ?
    if (!empty($_FILES['cover']) && $_FILES['cover']['error'] === 0) {

        //Supression de l'ancienne image et upload de la nouvelle image
        unlink("../images/upload/{$picture}");

        //Upload de la nouvelle image
        require_once 'inc/functions.php';
        $upload = uploadPicture($_FILES['cover'],'../images/upload', 1);

        //dump($upload);


        //Si je reçois une erreur lors de l'upload, je retourne l'erreur à ma variable "$error" afin de 
        //à ma variable "$error" afin de l'afficher au dessus du formulaire
        if (!empty($upload['error'])) {
            $error = $upload['error'];

        }
        else { 
            $picture =$upload['filename'];
        }
         
    }
            //Mise à jour des données en table "posts" seulement si la variable $error = NULL
            if ($error === null) {
                
                $query = $db->prepare('UPDATE posts SET title = :title, content = :content, cover = :cover, category_id = :category WHERE idpost = :idpost');
                $query->bindValue(':title', $title);
                $query->bindValue(':content', $content);
                $query->bindValue(':cover', $picture);
                $query->bindValue(':category', $category);
                $query->bindValue(':idpost', $id, PDO::PARAM_INT);
                $query->execute();
       }
       
    

   }
   else { 
       $error = 'Le titre, le contenu et la catégorie sont obligatoires';
   }
    

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link rel="stylesheet" href="../css/style.css">
    <title>Philosophy. -Administration (Edition d'un article)</title>
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
                            <a  href="index.php" title="Home" class="text-secondary text-decoration-none">Articles</a>
                            </li>
                        </ul>
                      </nav>
                    </div>
                </div> 
            </div>
        </header>
        <!--Dégrader-->
        <div class="gradient"></div>
    <main>                      <!---ne pas oublier "post"--->
       <div class="container">        

            <form method="post" enctype="multipart/form-data">

                        <!---Affichache d'un message de succès si nécessaire--->

                        <?php if ($success): ?>
                            <div class="alert alert-success"><?php echo $success;?></div>
                            <?php endif;?>

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
                    <div class="col-6 mb-3">
                        <label for="content" class="form-label">Contenu</label>
                        <textarea class="form-control" id="content" name="content" rows="10"><?php echo $content; ?></textarea>
                </div>
                <div class="text-center col-6">
                    <img src="../Images/upload/<?php echo $picture;?>" class="img-fluid rounded" alt="image">
                    </div>
                <div class="mb-3">
                    <label for="cover" class="form-label">Image de couverture</label>
                    <input class="form-control" type="file" id="cover" name="cover">
                    <div id="coverHelpBock" class="form-text">
                        L'image ne doit pas dépasser les 1Mo
                    </div>
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Catégorie</label>

                            <select class="form-select" list="datalistOptions" id="category" name="category">
                            <option value="">Choisir une categorie</option>

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
                    <button class="btn btn-primary" type="submit">Enregistrer les modifications</button>
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
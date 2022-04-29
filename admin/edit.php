<?php
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

//dump($article);
/**
 * Déclaration des variable à null
 * Elle serviront à remplir le formulaire des données soumise
 * par l'utilisateur 
 */
$title = $article['title'];
$content = $article['content'];
$category = $article['category_id'];
$error = null;


    


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
                            <a href="../index.php" title="Blog" class="text-secondary text-decoration-none">Blog</a>
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
                        <label for="exampleFormControlTextarea1" class="form-label">Contenu</label>
                        <textarea class="form-control" id="content" name="content" rows="10">
                            <?php echo $content; ?>
                        </textarea>
                </div>
                <div class="text-center col-6">
                    <img src="../Images/upload/<?php echo $article['cover'];?>" class="rounded col-6" alt="image">
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

                            <select class="form-select" list="datalistOptions" id="category" name="category" placeholder="Aucun fichier...séléctionné">
                        
                            <?php foreach($categories as $categorie): ?>
                                    <option value="<?php echo $categorie['idcat']?>"
                                    <?php echo ($category !== null && $category == $categorie['idcat']) ? 'selected': null; ?>>
                                    <?php echo $categorie['name']?>
                                </option>
                            <?php endforeach; ?>                                   
                        </select>
                    </div>
                <div>
                    <button class="btn btn-primary" type="submit">Enregistrer l'article</button>
             </div>   
            </form>
        </div>
    </main>
</body>
</html>
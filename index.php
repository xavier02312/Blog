<?php
//Ouverture de la session
session_start();


//connexion à la base de données
require_once 'connexion.php';

//Chargement des dépendances Composer
require_once 'vendor/autoload.php';

//dump($_SESSION['user']);
//Effectue la requête SQL
$query = $db->query('SELECT posts.idpost, posts.title, posts.content, posts.cover, posts.created_at,posts.category_id, category.name AS category  FROM posts INNER JOIN category ON category.idcat = posts.category_id ORDER BY posts.created_at DESC');

//Recupère tous les résultats et je les stockes dans la variable "$articles"
$articles = $query->fetchAll(); 

//Affiche les BDD pour visualiser
//dump($articles);

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
        <title>Bootstrap</title>
  </head>
        <body>
          <!---inclusion du header---->
          <?php require_once 'layouts/header.php'; ?>
                <main>  <!--contenue en mettent du bootstrap-->
                      <div class="container">
                                          <!---Message de bienvenu à l'utilisateur--->
                    <?php if(isset($_SESSION['user'])): ?>
                      <div class="alert alert-success">
                        Bonjour <?php echo $_SESSION['user']['firstname'] ?><?php echo $_SESSION['user']['lastname']; ?>
                        <a href="logout.php" title="Déconnexion">Se Déconnecter</a>
                      </div>
                      <?php endif; ?>

                        <div class="row">
                        <?php 
                            foreach($articles as $article):
                            ?>
                            <!---Colone contenant un article---> 
                          <div class="col-12 col-lg-6 pb-5">
                            <!--"article.php?id=" super glopale qui permet d'envoyer à l'article-->
                            <article>
                              <a href="article.php?id=<?php echo $article['idpost'];?>" title="<?php echo $article['title'];?>" class="text-dark text-decoration-none">
                                <img src="Images/upload/<?php echo $article['cover'];?>" alt="<?php echo $article['title'];?>" class="w-100 rounded">
                                <h1 class="pt-2"><?php echo $article['title']; ?></h1>
                              </a>                                    
                              <p class="text-secondary">
                                                            <!--date du jour de post-->
                                <?php
                                       $timestamp = strtotime($article['created_at']);
                                       echo date('d F Y', $timestamp); 
                                       ?>
                            </p>
                              <P class="py-2">
                                <?php 
                                        echo mb_strimwidth($article['content'], 0, 200, '...'); ?>
                              </P>
                              <div class="d-flex align-items-center gap-2">
                                <a href="categories.php?id=<?php echo $article['category_id'];?>" title="cat" class="badge rounded-pill bg-primary text-decoration-none">
                                <?php echo $article['category'];?>
                            </a>
                          </div>
                        </article>                            
                      </div>
                    <?php endforeach; ?>                         
                  </div>
                </div>                      
            </main> 
                      <!---inclusion du footer---->
          <?php require_once 'layouts/footer.php'; ?>       
                <!--footer en mettent du bootstrap-->
                
        </body>
        </html>
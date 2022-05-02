<?php
//connexion à la base de données
require_once 'connexion.php';


//Chargement des dépendances
require_once 'vendor/autoload.php';

//Netoyage de la valeur reçue
/**
 * "category_id" correspond au nom de la variable dans l' URL
 */
$idcat = htmlspecialchars(strip_tags( $_GET['id']));

$query = $db->prepare('SELECT posts.idpost, posts.category_id, posts.title, posts.content, posts.cover, posts.created_at, category.name AS category, users.fistname, users.lastname FROM posts INNER JOIN category ON category.idcat = posts.category_id INNER JOIN users ON users.iduser = posts.user_id WHERE category_id = :category_id');
$query->bindValue(':category_id', $idcat, PDO::PARAM_INT);
$query->execute();

//Récupération d'un seul enregistrement
$articles = $query->fetchAll();
//dump($query);

//Erreur 404

if (!$articles) {
    header('Location: 404.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/mobilestyle.css">
    <link rel="stylesheet" href="css/style.css">
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

                          <h3 class="pb-3">
                              Catégorie : <?php echo $articles[0]['category'];?>
                        </h3>

                        <div class="row">
                        <?php foreach ($articles as $article): ?>
                            <!---Colone contenant un article---> 
                          <div class="col-12 col-lg-6 pb-5">
                            <!--"article.php?id=" super glopale qui permet d'envoyer à l'article-->
                            <article>
                              <a href="article.php?id=<?php echo $article['idpost'];?>" title="<?php ?>" class="text-dark text-decoration-none">
                                <img src="Images/upload/<?php echo $article['cover']?>" alt="<?php ?>bla.." class="w-100 rounded">
                                <h1 class="pt-2"><?php echo $article['title'] ?></h1>
                              </a>                                    
                              <p class="text-secondary">
                                                            <!--date du jour de post-->
                                <?php $timestamp = strtotime($article['created_at']);
                                       echo date('d F Y', $timestamp);?>
                            </p>
                              <P class="py-2">
                                <?php echo $article['content']?>
                              </P>
                              <div class="d-flex align-items-center gap-2">
                                <a href="categories.php?id=<?php echo $article['category_id']?>" title="<?php echo $article['title'] ?>titre" class="badge rounded-pill bg-primary text-decoration-none">
                                <?php echo $article['category']?>
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
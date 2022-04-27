<?php
//connexion à la base de données
require_once '../connexion.php';


//Chargement des dépendances
require_once '../vendor/autoload.php';

//requete SQL
$query = $db->query('SELECT idpost, title, created_at FROM posts ORDER BY posts.created_at DESC');

$articles =  $query->fetchAll();

//Affiche ma table
//dump($articles)


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

    <title>Philosophy</title>
</head>
<body>
        <header class="bg-dark py-4"> <!--on rajoute avec le site bootstrap du CSS-->
            <div class="container">
                <!--en tête-->
                <div class="row">
                  <!--ligne-->
                  <!--titre du site-->
                    <div class="col-6 col-lg-12 text-start text-lg-center">
                     <a href="../index.php" title="Philosophy" class="text-white text-decoration-none h1 logo">
                        Philosophy.</a>
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
                            <a href="#" title="Home" class="text-secondary text-decoration-none">Blog</a>
                            </li>
                            <li class="nav-item">
                            <a  href="#" title="Categories" class="text-secondary text-decoration-none">Categories</a>
                            </li>
                        </ul>
                      </nav>
                    </div>
                </div> 
            </div>
                                 
        </header>
        <main>
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Titre</th>
                        <th>Date de création</th>
                        <th>Edite</th>
                        <th>Supprime</th>
                    </tr>
                </thead>
            <?php foreach($articles as $article):?>
                <tr>
                    
                    <td>
                        <?php echo $article['idpost']?>
                    </td>
                    <td>
                        <?php echo $article['title']?>
                    </td>
                    <td>
                        <?php $timestamp = strtotime($article['created_at']);
                                       echo date('d F Y', $timestamp);?>
                                       </td>
                    <td>
                            <a href="#" class="text-black text-decoration-none">edite</a>
                        
                    </td>
                    <td>
                            <a href="#" class="text-black text-decoration-none">supprime</a>
                    </td>
                   
                </tr>
                <?php endforeach;?>
            </table>
        </main>
</body>

</html>
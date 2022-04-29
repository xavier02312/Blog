<?php
//connexion à la base de données
require_once '../connexion.php';


//Chargement des dépendances
require_once '../vendor/autoload.php';

//requete SQL
$query = $db->query('SELECT idpost, title, created_at FROM posts ORDER BY posts.created_at DESC');

//Recupère tous les résultats et je les stocke dans la variable "$articles"
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
    <!---feuilles de style---->
    <link rel="stylesheet" href="../css/mobilestyle.css">
    <link rel="stylesheet" href="../css/style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Philosophy. -Administration</title>
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
                            <a  href="index.php" title="Home" class="text-secondary text-decoration-none">Artticles</a>
                            </li>
                        </ul>
                      </nav>
                    </div>
                </div> 
            </div>                     
        </header>
                   <!--Dégrader-->
                   <div class="gradient"></div>
        <main class="py-5">
            <div class="container">
                <div class="d-flex align-items-center justify-content-between pb-4">
                            <h3 class="pb-3">Gestion des articles</h3>
                            <a href="add.php" title="Ajouter un article" class="btn btn-success">
                                Nouvel article
                            </a>
                        </div>
                <!---Alert de succes pour l'article à bien été à jours--->
        <?php if (isset($_GET['successAdd'])):?>
            <div class="alert alert-success mb-4">
                L'article à bien été ajouté !
            </div>
            <?php endif; ?>
        <div class="table-responsive">
            <table class="table table-success table-hover table-bordered">
                <thead>
                    <tr>
                        <th class="col-1 table-active">id</th>
                        <th class="col-2 table-active">Titre</th>
                        <th class="col-1 table-active">Date de création</th>
                        <th class="col-1 table-active">Edite</th>
                        <th class="col-1 table-active">Supprime</th>
                    </tr>
                </thead>
                <tbody>
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
                    <td>    <!---bouton de validation--->
                            <a href="edit.php?id=<?php echo $article['idpost'];?>" class="text-black text-decoration-none" title="Edit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z"/>
                            </svg>
                            </a>
                    </td>
                    <td>    <!---Bouton de supp--->
                            <a href="#" class="text-black text-decoration-none" title="Delete">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-x" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6.146 8.146a.5.5 0 0 1 .708 0L8 9.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 0 1 0-.708z"/>
                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                            </svg>
                            </a>
                    </td>
                </tr>
                <?php endforeach;?>
              </tbody>  
            </table>
        </div>
      </div>    
    </main>
  </body>
</html>
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
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!---js--->
    <script src="js/delete.js" defer></script>
    <title>Philosophy. -Administration</title>
    <!---feuilles de style---->
    <link rel="stylesheet" href="../css/style.css">
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
                            <a  href="../article.php" title="Home" class="text-secondary text-decoration-none">Artticles</a>
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
                        <?php echo date('d.m.Y', strtotime($article['created_at']));?>
                                       </td>
                    <td>    <!---bouton de validation--->
                            <a href="edit.php?id=<?php echo $article['idpost'];?>" class="btn btn-secondary" title="Edit">
                            Editer
                            </a>
                    </td>
                    <td>    <!---Bouton de supp--->
                    <a href="delete.php?id=<?php echo $article['idpost'];?>" title="Delete" class="ps-2 btn btn-outline-danger btnDelete">
                Supprimer cet article</a>
                    </td>
                </tr>
                <?php endforeach;?>
              </tbody>  
            </table>
        </div>
      </div>
                <!-- Confirmation de suppression -->
                <div class="modal fade" id="confirmDelete" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Confirmation de suppression</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Êtes-vous sûr de vouloir supprimer cet article ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                            <a href="#" class="btn btn-danger btnDeleteModal">Oui, je supprime !</a>
                        </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    <footer class="bg-dark py-4">
            <div class="container">
                <p class="m-0 text-white">&copy; Copyright Philosophy 2022</p>
            </div>
    </footer>
  </body>
</html>
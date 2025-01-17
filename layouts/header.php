<header class="bg-dark py-4">
    <!--on rajoute avec le site bootstrap du CSS-->

    <div class="container">
        <!--en tête-->
        <div class="row">
            <!--ligne-->
            <!--titre du site-->
            <div class="col-6 col-lg-12 text-start text-lg-center">
                <a href="index.php" title="Philosophy" class="text-white text-decoration-none h1 logo">
                    Philosophy.</a>
            </div>
            <!--menu burger-->
            <div class="col-6 d-block d-lg-none text-end">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list text-white" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </div>
            <!--navigation-->
            <div class="col-12 d-none d-lg-block">
                <nav>
                    <ul class="d-flex align-items-center justify-content-center gap-5 py-3">
                        <li class="nav-item">
                            <a href="index.php" title="Home" class="text-secondary text-decoration-none">Home</a>
                        </li>
                        <?php if (isset($_SESSION['user'])) : ?>
                            <!---Déconnection--->
                            <li class="nav-item">
                                <a href="logout.php" title="Déconnection" class="text-danger text-decoration-none">Déconnection</a>
                            <?php else : ?>
                                <!---Connexion--->
                            </li>
                            <li class="nav-item">
                                <a href="login.php" title="Connexion" class="text-warning text-decoration-none">Connexion</a>
                            <?php endif; ?>
                            </li>
                            <!---Affiche un lien vers l'administration seulement si le role est "ROLE_ADMIN"---->
                            <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'ROLE_ADMIN') : ?>
                                <li><a href="admin/index.php" title="Administration" class="text-danger text-decoration-none">Administration</a></li>
                            <?php endif; ?>
                    </ul>
                </nav>
            </div>
            <!---affiche le carousel uniquement sur la page d'accueil---->
            <?php if ($_SERVER['SCRIPT_NAME'] === '/index.php') : ?>
                <!--carousel-->
                <div class="col-12">
                    <div class="row d-flex align-items-center">
                        <!--fleche gauche-->
                        <div class="col-lg-3 d-none d-lg-block text-end">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-caret-left-fill text-white" viewBox="0 0 16 16">
                                <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                            </svg>
                        </div>
                        <!--image du carousel-->
                        <div class="col-12 col-lg-6 pt-4 pt-lg-0"><img src="images/slide/02.jpg" alt="slide 02" class="w-100 rounded carousel-img">
                        </div>
                        <!--fleche droite-->
                        <div class="col-lg-3 d-none d-lg-block text-start">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-caret-right-fill text-white" viewBox="0 0 16 16">
                                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                            </svg>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>

</header>
<!--Dégrader-->
<div class="gradient"></div>
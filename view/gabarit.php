<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link type="text/css" href="<?php echo PUBLICS;?>css/style.css" rel="stylesheet">

        <title>Blog de Jean Forteroche</title>

    </head>

    <body>
        <!-- PRELOADER -->
      <!--  <div id="preloader">
            <div class="preload-content">
                <div id="world-load"></div>
            </div>
        </div> -->
        <!-- PRELOADER END -->

        <!-- HEADER AREA -->
        <header class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="navbar navbar-expand-lg">
                            <!-- Eventuel logo ici ? -->
                            <a class="nav-link link" href="<?php echo HOST;?>home"><span>Blog de Jean Forteroche</span></a>
                            <button class="navbar-toggler" type="button"></button>
                            <div class="collapse navbar-collapse">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo HOST;?>home">Accueil</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo HOST;?>posts">Articles/Chapitres</a>
                                    </li>

                                    <?php if($userSession->hasRole('admin')):?>

                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo HOST;?>newPost">Ecrire</a>
                                    </li>

                                    <?php endif;?>

                                    <?php if(!$userSession->logged()):?>

                                    <li>
                                        <a class="nav-link" href="<?php echo HOST;?>loginForm">Connexion</a>
                                    </li>

                                    <li>
                                        <a class="nav-link" href="<?php echo HOST;?>registerForm">Inscription</a>
                                    </li>

                                    <?php else :?>

                                    <li>
                                        <a class="nav-link" href="<?php echo HOST;?>logout">Déconnexion</a>
                                    </li>

                                    <?php endif;?>

                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <div class="hero-area bg-img background-overlay" style="background-color: black; height: 100px;">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="single-blog-title text-center">
                            <!-- Catégories ? -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section id="content">

            <?php echo $contentPage;?>

        </section>

        <footer>
            <div class="row justify-content-center">
                <div class="col-10 align-self-center">
                    <div style="text-align: center;">
                        <p> Jean Forteroche 2019-2020 © Tous droits réservés | Site construit par Hugo Dunogeant. Template by ColorLib ©</p>
                    </div>
                </div>
            </div>

            <script src="<?php echo PUBLICS;?>js/jquery-3.4.1.min.js"></script>
            <script src="<?php echo PUBLICS;?>js/bootstrap.min.js"></script>
        </footer>


    </body>


</html>

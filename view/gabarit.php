<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link type="text/css" href="<?= PUBLICS;?>css/bootstrap.min.css" rel="stylesheet">

        <link type="text/css" href="<?= PUBLICS;?>css/clean-blog.css" rel="stylesheet">

        <link type="text/css" href="<?= PUBLICS;?>css/font-awesome/all.min.css" rel="stylesheet">

        <title>Blog de Jean Forteroche</title>

    </head>

    <body>
        <!-- PRELOADER -->
        <div id="preloader">
            <div class="preload-content">
                <div id="world-load"></div>
            </div>
        </div>
        <!-- PRELOADER END -->

        <!-- NAV AREA -->
        <nav  id="mainNav" class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="<?= HOST;?>home">Blog de Jean Forteroche</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                </button>
                <div id="navbarResponsive" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= HOST;?>home">Accueil</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= HOST;?>posts">Articles/Chapitres</a>
                        </li>

                        <?php if($_SESSION['userSession']['role'] === 'admin'):?>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= HOST;?>newPost">Ecrire</a>
                            </li>

                        <?php endif;?>

                        <?php if($_SESSION['userSession']['role'] === 'visiteur'):?>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= HOST;?>loginForm">Connexion</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= HOST;?>registerForm">Inscription</a>
                            </li>

                        <?php else :?>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= HOST;?>logout">Déconnexion</a>
                            </li>

                        <?php endif;?>

                    </ul>
                </div>
            </div>
        </nav>

        <!-- HEADER AREA -->
        <header class="masthead" style="background-image: url('https://nsa40.casimages.com/img/2020/02/20/200220035616204375.jpg')">
            <div class="overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-10 mx-auto">
                            <div class="site-heading">
                                <h1>Billet simple pour l'Alaska</h1>
                                <span class="subheading">Un roman innovant par Jean Forteroche</span>
                            </div>
                        </div>
                    </div>
                </div>
        </header>

        <!-- CONTENT AREA -->
        <section id="content">

            <?= $contentPage;?>

        </section>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <p class="copyright text-muted"> Jean Forteroche 2019-2020 © Tous droits réservés | Site construit par Hugo Dunogeant.</p>
                    </div>
                </div>
            </div>

            <script src="<?= PUBLICS;?>js/jquery.js"></script>

            <script src="<?= PUBLICS;?>js/bootstrap.bundle.min.js"></script>

            <script src="<?= PUBLICS;?>js/clean-blog.min.js"></script>

            <script src="https://cdn.tiny.cloud/1/u9hufommepaia2247ruh1iezehj2kr2oxnscghfn9mw7125x/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
            <script>tinymce.init({
                    selector: 'textarea',  // change this value according to the HTML
                    toolbar: 'undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | outdent indent | cut copy paste',
                });
            </script>
        </footer>


    </body>


</html>

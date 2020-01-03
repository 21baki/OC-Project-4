<?php
//Controler loading
require('controller/controller.php');

if(isset($_GET['action'])) {
    if(isset($_GET['action'] == 'listPosts')) {
        listPosts();
    }
    elseif ($_GET['action'] == 'post') {
        if(isset($_GET['id']) && $_GET['id'] > 0) { //Verify if id are (int)
            post();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
}
else {
    listPosts();
}

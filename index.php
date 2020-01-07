<?php
//Controler loadings
require('model/Manager.php');
require('model/PostManager.php');
require('model/CommentManager.php');
require('model/Post.php');
require('controller/HomeController.php');
require('view/frontend/header.php');
require('view/frontend/home.php');
require('view/frontend/footer.php');
var_dump($_GET);
var_dump($_POST);

//TODO: Take require() in autoloader

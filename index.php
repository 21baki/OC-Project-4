<?php
//Controler loadings
require('model/PostManager.php');
require('model/CommentManager.php');
require('controller/controller.php');
require('view/frontend/header.php');
listPosts();
require('view/frontend/footer.php');

//TODO: Take require() in autoloader

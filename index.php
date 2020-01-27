<?php

$router = new Router($request);






/* require_once('controller/ControllerHome.php');
var_dump($_GET);

$url = '';
if(isset($_GET['url'])) {
    $url = explode('/', $_GET['url']);
}

var_dump($url);

if ($url[0] == 'page' AND $url[1] == 'create_post') {
    $post = new PostManager;
    $post->createPost($_POST['title'], $_POST['content'], $_POST['author']);
}else {
    echo 'Erreur 404';
} */



//TODO: Take require() in autoloader

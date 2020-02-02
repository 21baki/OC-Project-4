<?php

include_once ('config.php');

Autoload::start();

(isset($_GET['r'])) ? $request = $_GET['r'] : $request = 'index';

$router = new Router($request);
$router->renderController();

//TODO: replace author by pseudo in Post, Post Manager, Controller home, ect.. for more lisibility (and because i modified the database entry)






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

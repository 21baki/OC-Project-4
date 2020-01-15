<?php

use OC4\Model;

class Router
{

    private $ctrl;

    public function routeReq()
    {
        var_dump($_GET['page']);
        var_dump($_POST);
        require_once('controller/ControllerHome.php');

        if ($_GET['page'] == 'create_post') {
            require_once('model/PostManager.php');
            $post = new PostManager ;
            $post->createPost($_POST['title'], $_POST['content'], $_POST['author']);
            var_dump($post);
        }
        else {
            echo 'Bite';
        }

    }
}

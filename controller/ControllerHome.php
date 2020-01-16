<?php

require_once('model\PostManager.php');

class ControllerHome

{
    private $postManager;
    private $view;

    public function __construct()
    {

            $this->showPosts();

    }

    public function showPosts()
    {
        $this->postManager = new PostManager();
        $data = $this->postManager->getPosts();
        //var_dump($data);

        require_once('view/frontend/home.php');

    }

}

$controller_home = new ControllerHome;





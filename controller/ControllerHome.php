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
        var_dump($data);
        require_once('view/frontend/header.php');
        require_once('view/frontend/home.php');
        require_once('view/frontend/footer.php');
    }

}

$controller_home = new ControllerHome;





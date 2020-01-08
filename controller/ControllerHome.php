<?php

use OC4\Model\PostManager;

class ControllerHome

{
    private $postManager;
    private $view;

    public function __construct($url)
    {

            $this->posts();

    }

    private function posts()
    {
        $this->postManager = new PostManager();
        $data = $this->postManager->getPosts();

        require_once('view/frontend/home.php');
    }

}


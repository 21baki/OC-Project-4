<?php

class ControllerHome
{
    private $postManager;
    private $view;

    public function __construct($url)
    {
        if (isset($url) && count($url) > 1) {
            throw new Exception('Page introuvable');
        } else {
            $this->posts();
        }
    }

    private function posts()
    {
        $this->
    }
    }
}

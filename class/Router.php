<?php

class Router
{
    private $url;
    private $routes = [//TODO
     ];

    public function __construct()
    {
        $this->url = $url;

        $route = $this->getRoute();

        //TODO
    }

    /**
     * @return array
     */
    public function getRoutes()
    {
        $elements = explode('/', $this->url);
        return $elements[0];
    }

    //TODO
}



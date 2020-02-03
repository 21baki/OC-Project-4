<?php

class Router
{
    private $url;
    private $routes = [
        "index"     => ["controller" => 'ControllerHome',         "method" => 'showHome',         "area" => ''],
        "home"      => ["controller" => 'ControllerHome',         "method" => 'showHome',         "area" => ''],
     ];

    public function __construct($url)
    {
        $this->url = $url;

        $route = $this->getRoutes();
        $params = $this->getParams();

        $request = new Request();

        $request->setRoute($route);
        $request->setParams($params);

        $this->request = $request;
    }

    /**
     * @return array
     */
    public function getRoutes()
    {
        $elements = explode('/', $this->url);
        return $elements[0];
    }

    public function getParams()
    {
        $params = array();
        // extraction des paramètres de GET
        $elements = explode('/', $this->url);
        unset($elements[0]);
        for($i = 1; $i<count($elements); $i++) {
            $params[$elements[$i]] = $elements[$i+1];
            $i++;
        }
        // extraction des paramètres de POST
        if($_POST) {
            foreach($_POST as $key => $value) {
                $params[$key] = $value;
            }
        }
        return $params;
    }

    public function renderController()
    {
        $request = $this->request;

        if(key_exists($request->getRoute(), $this->routes)) {
            $controller = $this->routes[$request->getRoute()]['controller'];
            $method = $this->routes[$request->getRoute()]['method'];
            $area = $this->routes[$request->getRoute()]['area'];

            $currentController = new $controller();
            $currentController->$method($request);

        } else {
            $newController = new View();
            $newController->render('404');
        }
    }
}



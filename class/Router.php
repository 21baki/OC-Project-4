<?php

class Router
{
    private $url;
    private $routes = [
        "index"             => ["controller" => 'ControllerHome',         "method" => 'showHome',         "area" => ''],
        "home"              => ["controller" => 'ControllerHome',         "method" => 'showHome',         "area" => ''],
        "posts"             => ["controller" => 'ControllerHome',         "method" => 'showPosts',        "area" => ''],
        //"posts"             => ["controller" => 'ControllerHome',         "method" => 'show5Posts',        "area" => ''],
        "post"              => ["controller" => 'ControllerHome',         "method" => 'showPost',         "area" => ''],
        "loginForm"         => ["controller" => 'ControllerHome',         "method" => 'showLogin',        "area" => ''],
        "registerForm"      => ["controller" => 'ControllerHome',         "method" => 'showRegistration', "area" => ''],
        "newPost"           => ["controller" => 'ControllerHome',         "method" => 'showEditForm',     "area" => ''],
        "connect"           => ["controller" => 'ControllerHome',         "method" => 'showConnect',      "area" => ''],
        "403"               => ["controller" => 'ControllerHome',         "method" => 'show403',          "area" => ''],
        "404"               => ["controller" => 'ControllerHome',         "method" => 'show404',          "area" => ''],
        "register"          => ["controller" => 'ControllerAuthentification', "method" => 'isValid',      "area" => ''],
        "connexion.php"     => ["controller" => 'ControllerAuthentification', "method" => 'signIn',       "area" => ''],
        "logout"            => ["controller" => 'ControllerAuthentification', "method" => 'signOut',      "area" => ''],
        "comment"           => ["controller" => 'ControllerComment',       "method" => 'createComment',   "area" => ''],
        "deleteComment"     => ["controller" => 'ControllerComment',       "method" => 'deleteComment',   "area" => ''],
        "editComment"       => ["controller" => 'ControllerComment',       "method" => 'editComment',     "area" => ''],
        "updateComment"     => ["controller" => 'ControllerComment',       "method" => 'updateComment',   "area" => ''],
        "reportComment"     => ["controller" => 'ControllerComment',       "method" => 'reportComment',   "area" => ''],
        "create"            => ["controller" => 'ControllerPost',       "method" => 'createArticle', "area" => 'admin'],
        "edit"              => ["controller" => 'ControllerPost',       "method" => 'editArticle',   "area" => 'admin'],
        "update"            => ["controller" => 'ControllerPost',       "method" => 'updateArticle', "area" => 'admin'],
        "delete"            => ["controller" => 'ControllerPost',       "method" => 'deleteArticle', "area" => 'admin'],
     ];

    /**
     * Router constructor.
     * @param $url
     */
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

    /**
     * @return array
     */
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

    /**
     *
     */
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



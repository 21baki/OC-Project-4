<?php

class View
{
    protected $userSession;
    protected $template;

    public function __construct()
    {
        $this->userSession = new UserSession();
    }

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param mixed $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;

        return $this;
    }

    /**
     * @param $template
     * @param array $params
     */
    public function render($template, $params = array())
    {
        extract($params);


        $userSession = $this->userSession;

        ob_start();
        include_once(VIEW.$template.'.php');

        $contentPage = ob_get_clean();

        include_once(VIEW.'gabarit.php');
    }

    /**
     * @param $route
     */
    public function redirect($route)
    {
        header('Location:'.HOST.$route);
        exit;
    }
}

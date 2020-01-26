<?php

class View
{
    protected $userSession;
    protected $template;

    public function __construct()
    {
        //TODO
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

    public function render($template, $params = array())
    {
        //TODO
    }

    public function redirect($route)
    {
        //TODO
    }
}

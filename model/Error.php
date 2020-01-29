<?php

class Error
{
    private $ErrorPseudo;
    private $ErrorPassword;
    private $ErrorConf;
    private $ErrorEmail;
    private $Clean;

    /**
     * @return mixed
     */
    public function getErrorPseudo()
    {
        return $this->ErrorPseudo;
    }

    /**
     * @param mixed $ErrorPseudo
     */
    public function setErrorPseudo($ErrorPseudo)
    {
        $this->ErrorPseudo = $ErrorPseudo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getErrorPassword()
    {
        return $this->ErrorPassword;
    }

    /**
     * @param mixed $ErrorPassword
     */
    public function setErrorPassword($ErrorPassword)
    {
        $this->ErrorPassword = $ErrorPassword;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getErrorConf()
    {
        return $this->ErrorConf;
    }

    /**
     * @param mixed $ErrorConf
     */
    public function setErrorConf($ErrorConf)
    {
        $this->ErrorConf = $ErrorConf;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getErrorEmail()
    {
        return $this->ErrorEmail;
    }

    /**
     * @param mixed $ErrorEmail
     */
    public function setErrorEmail($ErrorEmail)
    {
        $this->ErrorEmail = $ErrorEmail;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getClean()
    {
        return $this->Clean;
    }

    /**
     * @param mixed $Clean
     */
    public function setClean($Clean)
    {
        $this->Clean = $Clean;

        return $this;
    }
}

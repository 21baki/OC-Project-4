<?php

class User {
    private $id;
    private $pseudo;
    private $password;
    private $email;
    private $role;
    private $errorsPseudo;
    private $errorsMail;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getErrorsPseudo()
    {
        return $this->errorsPseudo;
    }

    /**
     * @param mixed $errorsPseudo
     */
    public function setErrorsPseudo($errorsPseudo)
    {
        $this->errorsPseudo = $errorsPseudo;
    }

    /**
     * @return mixed
     */
    public function getErrorsMail()
    {
        return $this->errorsMail;
    }

    /**
     * @param mixed $errorsMail
     */
    public function setErrorsMail($errorsMail)
    {
        $this->errorsMail = $errorsMail;
    }
}

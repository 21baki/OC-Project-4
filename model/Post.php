<?php

class Post
{
    private $id;
    private $name;
    private $content;
    private $author;
    private $date_creation;
    public function __construct($data = null)
    {
        if($data)
        {
            $this->hydrate($data);
        }
    }
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {

        }
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @param mixed $name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }
    /**
     * @param mixed $content
     *
     * @return self
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }
    /**
     * @param mixed $author
     *
     * @return self
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }
    /**
     * @return DateTime
     */
    public function getDateCreation()
    {
        $date = new DateTime($this->date_creation);
        return $date;
        // $this->createdAt
        // passer la date JJ/MM/AAAA
    }
    /**
     * @param mixed $createdAt
     *
     * @return self
     */
    public function setDateCreation($createdAt)
    {
        $this->date_creation = $createdAt;
        return $this;
    }
}

<?php


class Post
{
    private $id;
    private $title;
    private $content;
    private $author;
    private $creation_date;

    /**
     * Post constructor.
     * @param null $data
     */
    public function __construct($data = null)
    {
        if($data)
        {
            $this->hydrate($data);
        }
    }

    /**
     * @param array $data
     */
    public function hydrate(array $data)
    {
        foreach($data as $key => $value) {
            $method = 'set'.ucfirst($key);

            if(method_exists($this, $method)) {
                $this->$method($value);
            }
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
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * @param mixed $name
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
     *s
     */
    public function getCreation_Date()
    {
        return $this->creation_date;
        // $this->createdAt
        // passer la date JJ/MM/AAAA
    }
    /**
     * @param mixed $createdAt
     *
     * @return self
     */
    public function setCreation_Date($createdAt)
    {
        $this->creation_date = $createdAt;
        return $this;
    }
}

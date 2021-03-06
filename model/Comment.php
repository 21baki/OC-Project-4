<?php

class Comment
{
    private $id;
    private $postId;
    private $pseudo;
    private $comment_content;
    private $creation_date;
    private $rating;

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
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * @param mixed $postId
     */
    public function setPostId($postId)
    {
        $this->postId = $postId;
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
    public function getComment_Content()
    {
        return $this->comment_content;
    }

    /**
     * @param mixed $comment_content
     */
    public function setComment_Content($comment_content)
    {
        $this->comment_content = $comment_content;

        return $this;
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function getCreation_Date()
    {
        $date = new DateTime($this->creation_date);

        return $date;
    }

    /**
     * @param mixed $creation_date
     */
    public function setCreation_Date($creation_date)
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return (int) $this->rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
    }
}


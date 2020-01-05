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

        public function hydrate()
        {

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
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name)
        {
            $this->name = $name;
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
         */
        public function setAuthor($author)
        {
            $this->author = $author;
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
         */
        public function setContent($content)
        {
            $this->content = $content;
        }

        /**
         * @return mixed
         */
        public function getDateCreation()
        {
            return $this->date_creation;
        }

        /**
         * @param mixed $date_creation
         */
        public function setDateCreation($date_creation)
        {
            $this->date_creation = $date_creation;
        }

    }

<?php

namespace OC4\Model;
use PDO;

class PostManager extends Manager {

    //two functions that inherit from Manager
    public function __construct()
    {
        parent::__construct();
    }

    public function getEntityName()
    {
        return "PostManager";
    }


    /* this function recover the posts in DB
     */

    public function getPosts() {
        $dbh = $this->dbh;
        $query = 'SELECT * FROM posts ORDER BY creation_date';
        $req = $dbh->prepare($query);
        $req->execute();

        $req->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'OC4\Model\Post');
        $data = $req->fetchAll();

        return $data;
    }

    public function getLastPost() {
        $dbh = $this->dbh;
        $query = 'SELECT * FROM posts ORDER BY creation_date DESC LIMIT 0, 1';
        $req = $dbh->prepare($query);
        $req->execute();

        $row = $req->fetch(PDO::FETCH_ASSOC);
        $lastPost = new Post($row);

        return $lastPost;
    }

    /* param $postId = (int)
     * this function retrieve posts 1 by 1, according to their id*/

    public function getPost($postId) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;

    }

    //TODO: système de CRUD
    public function createPost($title, $content, $author) {
        $dbh = $this->dbh;

        $query = 'INSERT INTO posts(title, content, author, creation_date) VALUES(:title, :content, :author, NOW())';

        $req = $dbh->prepare($query);
        //bindParam() binds a parameter to the specified variable name
        $req->bindParam('title', $title);
        $req->bindParam('content', $content);
        $req->bindParam('author', $author);

    }

    public function updatePost($id, $title, $content, $author) {
        $dbh = $this->dbh;

        $query = 'UPDATE posts SET title = :title, content = :content, author = :author  WHERE id = :id';

        $req = $dbh->prepare($query);
        $req->bindParam('id', $id, PDO::PARAM_INT);
        $req->bindParam('title', $title, PDO::PARAM_STR);
        $req->bindParam('content', $content, PDO::PARAM_STR);
        $req->bindParam('author', $queryuthor, PDO::PARAM_STR);
        $req->execute();
    }

    public function deletePost() {

        //TODO
    }

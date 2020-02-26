<?php


require_once('Manager.php');

class PostManager extends Manager
{

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

    public function getPosts()
    {
        $dbh = $this->dbh;
        $query = 'SELECT * FROM posts ORDER BY creation_date DESC';

        $req = $dbh->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $post = new Post();

            $post->hydrate($row);

            $Posts[] = $post;
        }

        return $Posts;
    }

    //TODO
    public function get5Posts($start, $perPage)
    {
        $dbh = $this->dbh;
        $query = 'SELECT * FROM posts ORDER BY creation_date DESC LIMIT $start, $perPage';

        $req = $dbh->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $post = new Post();

            $post->hydrate($row);

            $Posts[] = $post;
        }

        return $Posts;
    }

    //TODO
    public function countPost()
    {
        $dbh = $this->dbh;
        $query =  'SELECT COUNT(id) FROM posts';

        $req = $dbh->prepare($query);
        $req->execute();
        $count = (int) $req->fetch()[0];

        return $count;
    }

    public function getLastPost()
    {
        $dbh = $this->dbh;
        $query = 'SELECT * FROM posts ORDER BY creation_date DESC LIMIT 0, 1';

        $req = $dbh->prepare($query);
        $req->execute();

        $row = $req->fetch(PDO::FETCH_ASSOC);

        $LastPost = new Post($row);

        return $LastPost;
    }

    /* param $postId = (int)
     * this function retrieve posts 1 by 1, according to their id*/

    public function getPost($id)
    {
        $dbh = $this->dbh;
        $query = 'SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts WHERE id = :id';

        $req = $dbh->prepare($query);
        $req->bindParam('id', $id, PDO::PARAM_INT);
        $req->execute();

        $row = $req->fetch(PDO::FETCH_ASSOC);

        $Post = new Post($row);

        return $Post;

    }

    public function createPost($title, $content, $author)
    {
        $dbh = $this->dbh;

        $query = 'INSERT INTO posts(title, content, author, creation_date) VALUES(:title, :content, :author, NOW())';

        $req = $dbh->prepare($query);
        //bindParam() binds a parameter to the specified variable name
        $req->bindParam('title', $title);
        $req->bindParam('content', $content);
        $req->bindParam('author', $author);
        $req->execute();

    }

    public function updatePost($id, $title, $content, $author)
    {
        $dbh = $this->dbh;

        $query = 'UPDATE posts SET title = :title, content = :content, author = :author  WHERE id = :id';

        $req = $dbh->prepare($query);
        $req->bindParam('id', $id, PDO::PARAM_INT);
        $req->bindParam('title', $title, PDO::PARAM_STR);
        $req->bindParam('content', $content, PDO::PARAM_STR);
        $req->bindParam('author', $author, PDO::PARAM_STR);
        $req->execute();
    }

    public function deletePost($id)
    {
        $dbh = $this->dbh;

        $query = 'DELETE FROM posts WHERE id = :id';

        $req = $dbh->prepare($query);
        $req->bindParam('id', $id, PDO::PARAM_INT);
        $req->execute();
    }

}

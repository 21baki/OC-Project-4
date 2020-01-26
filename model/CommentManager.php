<?php

require_once('Manager.php');

//TODO: Configurer User et UserManager avant de s'occuper de cette partie

class CommentManager extends Manager {



    public function getComments($postId)
    {
        $dbh = $this->dbh;

        $query = 'SELECT * FROM comments WHERE id_post = :id_post ORDER BY creation_date';

        $req = $dbh->prepare($query);
        $req->bindParam('id_post', $postId, PDO::PARAM_STR);

        $req->execute();
    }

    public
    function getComment($id)
    {
        $dbh = $this->dbh;

        $query = 'SELECT * FROM comments WHERE id = :id';

        $req = $dbh->prepare($query);
        $req->bindParam('id', $id, PDO::PARAM_INT);

        $req->execute();

        $row = $req->fetchAll(PDO::FETCH_ASSOC);

        $Comments = new Comment(); //TODO
        $Comments->hydrate($row);

        return $Comments;
    }

    public
    function createComment($pseudo, $content, $postId)
    {
        $dbh = $this->dbh;

        $query = 'INSERT INTO comments(author, id_post, comment_content, creation_date) VALUES(:author, :comment_content, :id_post, NOW())';

        $req = $dbh->prepare($query);
        $req->bindParam('author', $author);
        $req->bindParam('id_post', $id_post);
        $req->bindParam('id_post', $id_post);

        $req->execute();
    }

    public function updateComment($id, $id_post, $author, $comment_content)
    {
        $dbh = $this->dbh;

        $query = 'UPDATE comments SET comment_content = :content, pseudo = :pseudo, post_id = :post_id WHERE id = :id';

        $req = $dbh->prepare($query);
        $req->bindParam('id', $id, PDO::PARAM_INT);
        $req->bindParam('id_post', $id_post, PDO::PARAM_INT);
        $req->bindParam('author', $author, PDO::PARAM_STR);
        $req->bindParam('comment_content', $comment_content, PDO::PARAM_STR);

        $req->execute();
    }

    public function deleteComment($id)
    {
        $dbh = $this->dbh;

        $query = 'DELETE FROM comments WHERE id = :id';

        $req = $dbh->prepare($query);
        $req->bindParam('id', $id, PDO::PARAM_INT);

        $req->execute();
    }

}

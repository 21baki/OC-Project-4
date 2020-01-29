<?php

require_once('Manager.php');

class CommentManager extends Manager {

    public function getEntityName()
    {
        return 'CommentManager';
    }

    public function getComments($postId)
    {
        $dbh = $this->dbh;

        $query = 'SELECT * FROM comments WHERE id_post = :id_post ORDER BY creation_date';

        $req = $dbh->prepare($query);
        $req->bindParam('postId', $postId, PDO::PARAM_INT);

        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $comment = new Comment();

            $comment->hydrate($row);

            $Comments[] = $comment;
        }

        if(empty($Comments)) {
            return $Comments = NULL;
        }

        return $Comments;
    }

    public
    function getComment($id)
    {
        $dbh = $this->dbh;

        $query = 'SELECT * FROM comments WHERE id = :id';

        $req = $dbh->prepare($query);
        $req->bindParam('id', $id, PDO::PARAM_INT);

        $req->execute();

        $row = $req->fetch(PDO::FETCH_ASSOC);

        $Comments = new Comment(); //TODO
        $Comments->hydrate($row);

        return $Comments;
    }


    public function createComment($pseudo, $comment_content, $postId)
    {
        $dbh = $this->dbh;

        $query = 'INSERT INTO comments(pseudo, postId, comment_content, creation_date) VALUES(:pseudo, :comment_content, :postId, NOW())';

        $req = $dbh->prepare($query);
        $req->bindParam('pseudo', $pseudo);
        $req->bindParam('postId', $postId);
        $req->bindParam('comment_content', $comment_content);

        $req->execute();
    }

    public function updateComment($id, $postId, $pseudo, $comment_content)
    {
        $dbh = $this->dbh;

        $query = 'UPDATE comments SET comment_content = :content, pseudo = :pseudo, postId = :postId WHERE id = :id';

        $req = $dbh->prepare($query);
        $req->bindParam('id', $id, PDO::PARAM_INT);
        $req->bindParam('postId', $postId, PDO::PARAM_INT);
        $req->bindParam('pseudo', $pseudo, PDO::PARAM_STR);
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

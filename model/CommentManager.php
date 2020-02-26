<?php

require_once('Manager.php');

class CommentManager extends Manager {

    public function getEntityName()
    {
        return 'CommentManager';
    }

    /**
     * @param $postId
     * @return array|null
     */
    public function getComments($postId)
    {
        $dbh = $this->dbh;

        $query = 'SELECT * FROM comments WHERE postId = :postId ORDER BY creation_date';

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

    /**
     * @param $id
     * @return Comment
     */
    public function getComment($id)
    {
        $dbh = $this->dbh;

        $query = 'SELECT * FROM comments WHERE id = :id';

        $req = $dbh->prepare($query);
        $req->bindParam('id', $id, PDO::PARAM_INT);

        $req->execute();

        $row = $req->fetch(PDO::FETCH_ASSOC);

        $Comments = new Comment();
        $Comments->hydrate($row);

        return $Comments;
    }

    /**
     * @param $pseudo
     * @param $comment_content
     * @param $postId
     */
    public function createComment($pseudo, $comment_content, $postId)
    {
        $dbh = $this->dbh;

        $query = 'INSERT INTO comments(postId, pseudo, comment_content, creation_date, rating) VALUES(?, ?, ?, NOW(), 0)';

        $req = $dbh->prepare($query);
        $req->bindParam(1, $postId, PDO::PARAM_INT);
        $req->bindParam(2, $pseudo, PDO::PARAM_STR);
        $req->bindParam(3, $comment_content, PDO::PARAM_STR);

        $req->execute();

        var_dump($pseudo);
        var_dump($comment_content);
        var_dump($postId);
    }

    /**
     * @param $id
     * @param $postId
     * @param $pseudo
     * @param $comment_content
     */
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

    /**
     * @param $id
     */
    public function deleteComment($id)
    {
        $dbh = $this->dbh;

        $query = 'DELETE FROM comments WHERE id = :id';

        $req = $dbh->prepare($query);
        $req->bindParam('id', $id, PDO::PARAM_INT);

        $req->execute();
    }

    /**
     * @param $id
     */
    public function reportComment($id)
    {
        $dbh = $this->dbh;

        $query = 'UPDATE comments SET rating = rating-1 WHERE id = :id';

        $req = $dbh->prepare($query);
        $req->bindParam('id', $id, PDO::PARAM_INT);
        $req->execute();
    }

}

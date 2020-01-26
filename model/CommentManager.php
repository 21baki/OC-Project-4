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

    public function getComment($id)
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




}

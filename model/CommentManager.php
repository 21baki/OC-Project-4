<?php
class CommentManager {

    /* param $postId = (int)
     * this function retrieves comments relating to each post via $postId
     */
    public function getComments($postId) {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \' % d /%m /%Y\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    /* param $postId = (int)
     * param $author = (string)
     * param $comment = (string)
     * this function displays comments
     */

    public function postComment($postId, $author, $comment) {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;

    }

    private function dbConnect() {
        $db = new PDO('mysql:host=localhost;dbname=oc4', 'root', '');
        return $db;
    }
}

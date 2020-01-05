<?php
class PostManager {


    /* this function recover the posts in DB
     */

    public function getPosts() {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
        while ($data = $req->fetch()) {//while loop for view
            echo '<div id="onePost"><h1>' . $data['title'] . '</h1>' . $data['content'] . '<br />' . $data['creation_date_fr'] .  '</div>';
        }
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

    /* this function connects to the database with PDO
     */

    private function dbConnect() {
        //TODO : Ne pas oublier de changer l'accès lors de l'export de la DB
        //TODO : Déplacer cette fonction ailleurs
        $db = new PDO('mysql:host=localhost;dbname=oc4', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
}

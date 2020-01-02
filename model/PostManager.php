<?php
class PostManager {


    /* this function recover the posts in DB
     */

    public function getPosts() {

    }

    /* param $postId = (int)
     * this function retrieve posts 1 by 1, according to their id*/

    public function getPost() {

    }

    /* this function connects to the database with PDO
     */

    private function dbConnect() {
        //TODO : Ne pas oublier de changer l'accès lors de l'export de la DB
        $db = new PDO('mysql:host=localhost;dbname=OC4', 'root', '');
        return $db;
    }
}

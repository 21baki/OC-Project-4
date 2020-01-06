<?php

class Home {

    public function showHome() {

        $manager = new \OC4\Model\PostManager();
        $lastPost = $manager->getPosts();

        return $lastPost;
    }
}

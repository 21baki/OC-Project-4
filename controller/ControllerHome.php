<?php

require_once('model\PostManager.php');

class ControllerHome extends View
{
    public function showHome()
    {
        $manager = new PostManager();
        $LastPost = $manager->getLastPost();

        $this->render('LastPost', array('Posts' => $LastPost));
    }

    public function showPosts()
    {
        $manager = new PostManager();
        $Posts = $manager->getPosts();

        $this->render('Posts',  array('Posts' => $Posts));
    }

    public function showPost($request)
    {
        $id = $request->get('id');
        $manager = new PostManager();
        $Post = $manager->getPost($id);

        $manager2 = new CommentManager();
        $Comments = $manager2->getComments($id);

        $this->render('post', array('Post' => $Post, 'Comments' => $Comments));
    }

    public function showComments($request)
    {
        $postId = $request->get('id');

        $manager = new CommentManager();
        $Comments = $manager->getComments($postId);

        $this->render('comments', array('Comments' => $Comments));
    }

    public function showRegistration()
    {
        $this->render('register');
    }

    public function showLogin()
    {
        $this->render('login');
    }

    public function showEditForm()
    {
        $this->render('edit');
    }

    public function showConnect()
    {
        $this->render('connected');
    }

    public function show403()
    {
        $this->render('403');
    }

    public function show404()
    {
        $this->render('404');
    }
}




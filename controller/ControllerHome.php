<?php


class ControllerHome extends View
{
    public function showHome()
    {
        $manager = new PostManager();
        $LastPost = $manager->getLastPost();

        $this->render('home', array('LastPost' => $LastPost));
    }

    public function showPosts()
    {
        $manager = new PostManager();
        $Posts = $manager->getPosts();

        $this->render('posts',  array('Posts' => $Posts));
    }

    //TODO
    public function show5Posts()
    {
        $manager = new PostManager();
        $count = $manager->countPost();

        $currentPage = $_GET['page'] ?? 1;

        var_dump($currentPage);

        if(!filter_var($currentPage, FILTER_VALIDATE_INT) || $currentPage <= 0) {
            $this->show404();
        }

        if($currentPage === '1') {
            header('Location: index.php?action=posts');
        }

        $perPage = 5;
        $start = $perPage*($currentPage-1);
        var_dump($start);
        $pages = ceil($count /$perPage);

        if($currentPage > $pages) {
            $this->show404();
        }

        $Posts = $manager->get5Posts($start, $perPage);

        $this->render('posts', array('Posts' => $Posts));

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
        if ($_SESSION['userSession']['role'] === 'admin') {
            $this->render('edit');
        } else {
            $this->render('403');
        }
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




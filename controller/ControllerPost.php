<?php

class ControllerPost extends View
{
    //I replaced "post" by "article" in the methods to avoid confusion with the PostManager methods
    /**
     * @param $request
     */
    public function editArticle($request)
    {
        if($this->userSession->noRole('admin')) {
            $this->redirect('403');
        }

        $id = $request->get('id');

        $manager = new PostManager();
        $article = $manager->getPost($id);

        $this->render('edit', array('article' => $article));
    }

    /**
     * @param $request
     */
    public function createArticle($request)
    {
        if($this->userSession->noRole('admin')) {
            $this->redirect('403');
        }

        $title = $request->get('title');
        $content = $request->get('content');
        $author = $this->userSession->getPseudo();

        $manager = new PostManager();
        $manager->createPost($title, $content, $author);

        $this->redirect('index');
    }

    /**
     * @param $request
     */
    public function updateArticle($request)
    {
        if($this->userSession->noRole('admin')) {
            $this->redirect('403');
        }

        $id = $request->get('id');
        $title = $request->get('title');
        $content = $request->get('content');
        $author = $this->userSession->getPseudo();

        $manager = new PostManager();
        $manager->updatePost($id, $title, $content, $author);

        $this->redirect('posts');
    }

    /**
     * @param $request
     */
    public function deleteArticle($request)
    {
        if($this->userSession->noRole('admin')) {
            $this->redirect('403');
        }

        $id = $request->get('id');

        $manager = new PostManager();
        $manager->deletePost($id);

        $this->redirect('posts');
    }
}

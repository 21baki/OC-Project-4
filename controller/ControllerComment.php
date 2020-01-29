<?php

class ControllerComment extends View
{
    public function createComment($request)
    {
        if(!$this->userSession->logged()) {
            $this->redirect('connect');
        }

        $pseudo = $this->userSession->getPseudo();
        $content = $request->get('content');
        $postId = $request->get('id');

        $manager = new CommentManager();
        $manager->createComment($pseudo, $content, $postId);

        $this->redirect('post/id/'.''.$postId);
    }

    public function editComment($request)
    {
        if($this->userSession->noRole('user') && $this->userSession->noRole('admin')) {
            $this->redirect('home');
        }

        $id = $request->get('id');
        $postId = $request->get('postId');

        $manager = new CommentManager();
        $Comments = $manager->getComment($id);
        $pseudo = $this->userSession->getPseudo();

        if($pseudo != $Comments->getAuthor() && $this->userSession->noRole('admin')) {
            $this->redirect('403');
        }

        $this->render('editCom', array('Comments' => $Comments));
    }

    public function updateComment($request)
    {
        if($this->userSession->noRole('user') && $this->userSession->noRole('admin')) {
            $this->redirect('connect');
        }

        $id = $request->get('id');
        $postId = $request->get('postId');
        $content = $request->get('content');
        $pseudo = $this->userSession->getPseudo();

        $manager = new CommentManager();
        $manager->updateComment($id, $postId, $content, $pseudo);

        $this->redirect('post/id'.''.$postId);
    }

    public function deleteComment($request)
    {
        if(!$this->userSession->logged()) {
            $this->redirect('connect');
        }

        $id = $request->get('id');
        $postId = $request->get('postId');

        $manager = new CommentManager();
        $Comments = $manager->getComment($id);
        $pseudo = $this->userSession->getPseudo();

        if($pseudo != $Comments->getPseudo() && $this->userSession->noRole('admin')) {
            $this->redirect('403');
        }

        $manager->deleteComment($id);

        $this->redirect('post/id/'.''.$postId);
    }

    public function reportComment($request)
    {
        if(!$this->userSession->logged()) {
            $this->redirect('connect');
        }

        $id = $request->get('id');
        $postId = $request->get('postId');

        $manager = new CommentManager();
        $manager->reportComment($id);
        $Comments = $manager->getComment($id);

        $this->redirect('post/id/'.''.$postId);
    }
}

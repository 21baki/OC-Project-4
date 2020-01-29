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
        $comments = $manager->getComment($id);
        $pseudo = $this->userSession->getPseudo();

        if($pseudo != $comments->getAuthor() && $this->userSession->noRole('admin')) {
            $this->redirect('403');
        }

        $this->render('editCom', array('comments' => $comments));
    }

    public function updateComment($request)
    {
        //TODO
    }

    public function deleteComment
    {
        //TODO
    }

    public function reportComment
    {
        //TODO
    }§
}

<?php
//Class loading
require_once('../model/PostManager.php');
require_once('../model/CommentManager.php');

/*
 * this function displays the list of posts
 */
function listPosts() {
    //Create object
    $postManager = new PostManager();
    //Call of object function
    $posts = $postManager->getPosts();

    //TODO: require() -> build the listPostsView on view
}
/*
 * this function displays the post according to the param id
 */
function post() {
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    //Call getPost(), function of PostManager
    $post = $postManager->getPost($_GET['id']);
    //Call getComments(), function of CommentManager, and displays the comments according to the id
    $comments = $commentManager->getComments($_GET['id']);

    //TODO: require() -> build the postView on view
}

/*
 * this function add a comment to the post
 */
function addComment($postId, $author, $comment) {
    $commentManager = new CommentManager();
    //Call postComment(), function of CommentManager, and add a new lines of comment, with corresponding param
    $affectedLines = $commentManager->postComment($postId, $author, $comment);
    //Create a new Exception
    if($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId); //Concatenation with the value of $postId
    }
}

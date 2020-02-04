<?php if(isset($article)) {

    $title = $article->getTitle();
    $content = $article->getContent();
    $id = '/id/'.$article->getId();

    $action = 'update';
} else {
    $title = 'Titre';
    $content = '';
    $id = '';
    $action = 'create';
}
?>

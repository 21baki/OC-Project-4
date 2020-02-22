<div class="commentForm">
    <form method="post" action="<?= HOST.'updateComment/postId/'.$Comments->getIdPost().'/id/'.$Comments->getId();?>">
        <fieldset>
            <legend>Modifier un commentaire : </legend>
            <textarea name="content" type="text" id="content"><?= $Comments->getContent();?></textarea>
            <br />
            <input id="loginButton" type="submit" value="Envoyer" />
        </fieldset>
    </form>
</div>

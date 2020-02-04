<div class="commentForm">
    <form method="post" action="<?php echo HOST.'updateComment/postId/'.$Comments->getIdPost().'/id/'.$Comments->getId();?>">
        <fieldset>
            <legend>Modifier un commentaire : </legend>
            <textarea name="content" type="text" id="content"><?php echo $Comments->getContent();?></textarea>
            <br />
            <input id="loginButton" type="submit" value="Envoyer" />
        </fieldset>
    </form>
</div>

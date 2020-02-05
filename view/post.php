<div class="container">
    <div class="row justify-content-center">
        <div class="">
            <div class="">

                <div class="">
                    <h3> <?php echo $Post->getTitle();?> </h3>
                    <br />
                    <div class="PostContent"> <?php echo $Post->getContent();?> </div>
                    <br />
                    <span class="AuthorName"> <?php echo $Post->getAuthor();?> </span>
                    <span class="CreationDate"> <?php echo $Post->getCreationDate();?> </span>
                </div>

                <div class="contact-form">
                    <h5>Ecrire un commentaire :</h5>
                    <form method="post" action="<?php echo HOST.'comment/id/'.$Post->getId();?>">
                        <fieldset>
                            <textarea name="content" type="text" id="content" style="height: 300px;"></textarea>
                            <input id="loginBut" class="btn btn-primary" type="submit" value="Envoyer" />
                        </fieldset>
                    </form>
                </div>
            </div>

            <?php if(isset($Comments)):?>
                <h2>Commentaires</h2>
                <?php foreach($Comments as $comment):?>
                    <?php if($comment->getRating() != 0 || $userSession->hasRole('admin')):?>
                        <?php if($comment->getRating() != 1):?>
                        <?php $color='red';?>
                        <?php else :?>
                        <?php $color='black'; ?>
                        <?php endif;?>
                        <div class="container3" style="color: <?php echo $color;?>">
                            <div class="post">
                                <div class="PostContent"><?php echo $comment->getCommentContent();?></div>
                                <br />
                                <span class="AuthorName"><?php echo $comment->getPseudo();?></span>
                                <span class="CreationDate"><?php echo $comment->getCreationDate()->format('d/m/Y');?></span>
                                <?php if(($comment->getPseudo() === $userSession->getPseudo()) || $userSession->hasRole('admin')):?>
                                <a href="<?php echo HOST.'editComment/postId/'.$Post->getId().'/id/'.$comment->getId();?>">Modifier</a>
                                <a href="<?php echo HOST.'deleteComment/postId/'.$Post->getId().'/id/'.$comment->getId();?>">Supprimer</a>
                                <?php endif;?>
                                <?php if($userSession->logged() && ($comment->getRating() != 0)):?>
                                <a href="<?php echo HOST.'reportComment/postId/'.$Post->getId().'/id/'.$comment->getId();?>">Reporter</a>
                                <?php endif;?>
                            </div>
                        </div>
                    <?php endif;?>
                <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>
</div>

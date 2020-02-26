<div class="container">
    <div class="row">
        <div>
            <div>

                <div>
                    <h3> <?= $Post->getTitle();?> </h3>
                    <br />
                    <div class="PostContent"> <?= $Post->getContent();?> </div>
                    <br />
                    <span class="AuthorName"> <?= $Post->getAuthor();?> </span>
                    <span class="CreationDate"> <?= $Post->getCreation_Date();?> </span>
                    <hr>
                </div>

                <?php if($userSession->logged()):?>

                    <div class="form-text">

                        <h5>Ecrire un commentaire :</h5>

                        <form method="post" action="<?= HOST.'comment/id/'.$Post->getId();?>">
                            <fieldset>
                                <textarea name="content" type="text" id="content" style="height: 300px;"></textarea>
                                    <hr>
                                <input id="loginBut" class="btn btn-primary" type="submit" value="Envoyer" />
                            </fieldset>
                        </form>

                    </div>

                <?php endif;?>

            </div>

            <?php if(isset($Comments)):?>
                <hr/ >

                <h2>Commentaires</h2>

                <br />

                <?php foreach($Comments as $comment):?>

                    <?php if($comment->getRating() != 0 || $userSession->hasRole('admin') || $userSession->hasRole('user')):?>

                        <?php if($comment->getRating() != 0):?>
                            <?php $color='orange';?>
                        <?php else:?>
                            <?php $color='black'; ?>
                        <?php endif;?>

                    <?php endif;?>
                        <div class="container">

                            <div>

                                <div class="PostContent" style="word-wrap: break-word"><?= $comment->getComment_Content();?></div>
                                <br />
                                <span class="post-meta"><?= $comment->getPseudo();?></span>
                                <span class="CreationDate"><?= $comment->getCreation_Date()->format('d/m/Y');?></span>

                                <?php if(($comment->getPseudo() === $userSession->getPseudo()) || $userSession->hasRole('admin')):?>
                                    <br />
                                    <a href="<?= HOST.'editComment/postId/'.$Post->getId().'/id/'.$comment->getId();?>">Modifier</a>
                                    <a href="<?= HOST.'deleteComment/postId/'.$Post->getId().'/id/'.$comment->getId();?>"> | Supprimer</a>
                                <?php endif;?>

                                <?php if(($userSession->logged()) && ($comment->getPseudo() != $userSession->getPseudo()) && ($comment->getRating() === 0)):?>
                                    <a href="<?= HOST.'reportComment/postId/'.$Post->getId().'/id/'.$comment->getId();?>"> | Reporter</a>
                                <?php endif;?>
                                <hr />
                            </div>

                        </div>
                <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>
</div>

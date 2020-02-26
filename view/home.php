<div class="regular-page-wrap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12">
                <div>
                    <h1 class="">Dernier chapitre disponible</h1>
                    <hr />
                    <div class="post-preview">
                        <a class="link" href="<?= HOST.'post/id/'.$LastPost->getId();?>">
                        <h3> <?= $LastPost->getTitle();?> </h3>
                        </a>
                        <br />
                        <div class="PostContent">
                            <?php echo $LastPost->getContent();?>
                        </div>
                        <br />
                        <div>
                            <span class="postMeta"> Ecrit par <?php echo $LastPost->getAuthor();?> </span>
                            <span class="postMeta"> le <?= $LastPost->getCreation_Date();?> </span>

                            <br />

                            <?php if($userSession->hasRole('admin')):?>

                            <a href="<?= HOST.'edit/id/'.$LastPost->getId()?>">Editer</a>
                            <a href="<?= HOST.'delete/id/'.$LastPost->getId()?>"> | Supprimer </a>

                            <?php endif;?>

                            <hr />

                            <?php if($userSession->hasRole('visiteur')):?>

                            <a class="link" href="<?= HOST.'post/id/'.$LastPost->getId();?>">Voir les commentaires</a>
                            <?php else:?>
                            <a class="link" href="<?= HOST.'post/id/'.$LastPost->getId();?>">Commenter</a>

                            <?php endif;?>
                        </div>
                    </div>
                    <hr/>
                </div>
            </div>
        </div>
    </div>
</div>





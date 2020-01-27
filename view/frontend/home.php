
<div class="regular-page-wrap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12">
                <div class="page-content">
                    <h1>Dernier chapitre disponible</h1>
                    <div>
                        <a class="link" href="<?php echo HOST.'post/id/'.$LastPost->getId();?>">
                        <h3> <?php echo $LastPost->getTitle();?> </h3>
                        </a>
                        <br />
                        <div class="PostContent">
                            <?php echo $LastPost->getContent();?>
                        </div>
                        <br />
                        <div>
                            <span class="AuthorName"> <?php echo $LastPost->getAuthor();?> </span>
                            <span class="CreationDate"> <?php echo $LastPost->getCreationDate();?> </span>
                            <?php if($userSession->hasRole('admin')):?>
                            <a href="<?php echo HOST.'edit/id/'.$LastPost->getId()?>">Editer le post</a>
                            <a href="<?php echo HOST.'delete/id/'.$LastPost->getId()?>">Supprimer le post</a>
                            <?php endif;?>
                            <a class="link" href="<?php echo HOST.'post/id/'.$LastPost->getId();?>">Voir les commentaires</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





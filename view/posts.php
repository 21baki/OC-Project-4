<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="">
                <h2> Tous les Articles/Chapitres </h2>
                <?php foreach($Posts as $post):?>
                <div class="post-preview">
                    <a class="link" href="<?php echo HOST.'post/id/'.$post->getId()?>"><h3><?php echo $post->getTitle();?></h3></a>
                    <br />
                    <div class="PostContent"><?php echo substr($post->getContent(), 0, 1000);?>...<a class="link" href="<?php echo HOST.'post/id/'.$post->getId()?>">Suite</a> </div>
                    <br />
                    <span class="AuthorName"><?php echo $post->getAuthor();?></span>
                    <span class="CreationDate"> <?php echo $post->getCreationDate();?> </span>
                    <?php if($userSession->hasRole('admin')):?>
                    <a class="link" href="<?php echo HOST.'edit/id/'.$post->getId()?>">Editer</a>
                    <a class="link" href="<?php echo HOST.'delete/id/'.$post->getId()?>">Supprimer</a>
                    <?php endif;?>
                    <?php if($userSession->logged()):?>
                    <a class="link" href="<?php echo HOST.'post/id/'.$post->getId();?>">Commenter</a>
                    <?php endif;?>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>

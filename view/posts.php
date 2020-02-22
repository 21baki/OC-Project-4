<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="">
                <h2> Tous les Articles/Chapitres </h2>
                <hr>
                <?php foreach($Posts as $post):?>
                <div class="post-preview">
                    <a class="link" href="<?= HOST.'post/id/'.$post->getId()?>"><h3><?= $post->getTitle();?></h3></a>
                    <br />
                    <div class="PostContent"><?= substr($post->getContent(), 0, 500);?></div>
                    <br />
                    <span class="post-meta"> Ecrit par <?= $post->getAuthor();?></span>
                    <span class="CreationDate"> <?= $post->getCreationDate();?> </span>
                    <?php if($userSession->hasRole('admin')):?>
                    <a class="link" href="<?= HOST.'edit/id/'.$post->getId()?>">Editer</a>
                    <a class="link" href="<?= HOST.'delete/id/'.$post->getId()?>">Supprimer</a>
                    <?php endif;?>
                    <?php if($userSession->logged()):?>
                    <a class="link" href="<?= HOST.'post/id/'.$post->getId();?>">Commenter</a>
                    <?php endif;?>
                    <hr>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>

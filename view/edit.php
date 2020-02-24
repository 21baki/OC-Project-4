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

<div class="">
    <div class="container container2">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12">
                <div class="contact-form">
                    <h5>Editeur</h5>
                    <form method="post" action="<?= HOST.''.$action.''.$id;?>">

                        <fieldset>

                            <div class="group">
                                <input type="text" name="title" id="title"  value="<?= $title;?>" class="form-control">

                            </div>

                            <div class="group">
                                <textarea name="content" type="text" id="content" style="height: 500px;"><?= $content;?></textarea>
                                <br />
                                <span class="help-block" id="ErrNew" style="color:indigo;"></span>
                            </div>

                        </fieldset>

                        <button id="submitButton" class="btn btn-primary" type="submit" value="">Envoyer</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

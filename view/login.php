<?php if(isset($user)){
    $pseudo = $user->getPseudo();
    $errors = $user->getErrorsPseudo();
} else {
    $pseudo = '';
    $errors = '';
}
?>

<div>
    <div class="container container2">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12">
                <div>
                    <h5>Connexion</h5>
                    <hr />
                    <?php if (isset($error)): ?>
                        <?= $error;?>
                    <?php endif;?>

                    <form method="post" action="<?php echo HOST;?>connexion.php">

                        <fieldset>

                            <div class="form-group" style="max-width: 50%;">
                                <label for="pseudo">Pseudo</label>
                                <input class="form-control" type="text" name="pseudo" id="pseudo" value="<?php echo htmlspecialchars($pseudo);?>" required>
                            </div>

                            <div class="form-group" style="max-width: 50%;">
                                <label for="password">Mot de passe</label>
                                <input class="form-control" type="password" name="password" id="password" value="" >
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 hidden-xs-down control-label" for="button1id"></label>
                                <div class="col-sm-8">
                                    <button id="button1id" name="button1id" class="btn btn-primary">Connexion</button>
                                    <a id="registerLink"  class="btn btn-link" href="<?php echo HOST;?>registerForm">Vous souhaitez vous inscrire ?</a>
                                </div>
                            </div>

                        </fieldset>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

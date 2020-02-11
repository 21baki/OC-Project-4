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
                <div class="contact-form">
                    <h5>Connexion</h5>
                    <form method="post" action="connexion.php">
                        <fieldset>

                            <div class="group" style="max-width: 50%;">
                                <input type="text" name="pseudo" id="pseudo" value="<?php echo $pseudo;?>" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="pseudo">Pseudo</label>
                                <span class="help-block" style="color: indigo;"><?php echo $errors;?></span>
                            </div>

                            <div class="group" style="max-width: 50%;">
                                <input type="password" name="password" id="password" value="" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="password">Mot de passe</label>
                                <span class="help-block" style="color: indigo;"><?php echo $errors;?></span>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 hidden-xs-down control-label" for="button1id"></label>
                                <div class="col-sm-8">
                                    <button id="button1id" name="button1id" class="btn btn-primary">Connexion</button>
                                    <a id="registerLink" name="registerLink" class="btn btn-link" href="<?php echo HOST;?>registerForm">Vous souhaitez vous inscrire ?</a>
                                </div>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

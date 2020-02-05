<?php if(isset($user) || isset($errors)){
    $pseudo = $user->getPseudo();
    $email = $user->getEmail();
    $errorsPseudo = $user->getErrorPseudo();
    $errorsMail = $user->getErrorMail();

    $ErrPseudo = $errors->getErrorPseudo();
    $ErrPass = $errors->getErrorPass();
    $ErrConf = $errors->getErrorConf();
    $ErrEmail = $errors->getErrorEmail();
} else {
    $pseudo = '';
    $email = '';
    $errorsPseudo = '';
    $errorsMail = '';

    $ErrorPseudo = '';
    $ErrorPass = '';
    $ErrorConf = '';
    $ErrorEmail = '';
}
?>

<div class="">
    <div class="container container2">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12">
                <div class="contact-form">
                    <h5>Formulaire d'inscription</h5>
                    <form class="form-horizontal" method="post" action="register">
                        <fieldset>

                            <div class="group" style="max-width: 50%;">
                                <span class="help-block" style="color: indigo;"><?php echo $errorsPseudo;?></span>
                                <input type="text" name="pseudo" id="pseudo" value="<?php echo $pseudo;?>" required/>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="pseudo">Pseudo</label>
                                <span class="help-block">4 à 16 caractères, lettres et/ou chiffres</span>
                                <span class="help-block" style="color:indigo;"><?php echo $ErrorPseudo?></span>
                            </div>

                            <div class="group" style="max-width: 50%;">
                                <input type="password" name="password" id="password"  value="" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="password">Mot de passe</label>
                                <span class="help-block">5 à 16 caractères, lettres et chiffres, caractères spéciaux</span>
                                <span class="help-block" style="color:indigo;"><?php echo $ErrorPass?></span>
                            </div>

                            <div class="group" style="max-width: 50%;">
                                <input type="password" name="confirm" id="confirm"  value="" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="confirm">Confirmation du mot de passe</label>
                                <span class="help-block" style="color:indigo;"><?php echo $ErrorConf;?></span>
                            </div>

                            <div class="group" style="max-width: 50%">
                                <span class="help-block" style="color: indigo"><?php echo $errorsMail;?></span>
                                <input type="text" name="email" id="email"  value="<?php echo $email;?>" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="email">E-mail</label>
                                <span class="help-block" style="color:indigo;"><?php echo $ErrorEmail;?></span>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="loginButton"></label>
                                <div class="col-sm-4">
                                    <button id="loginButton" name="loginButton" class="btn btn-primary">Inscription</button>
                                </div>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

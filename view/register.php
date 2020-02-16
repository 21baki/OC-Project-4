 <?php /* if(isset($user) || isset($errors)){
    $pseudo = $user->getPseudo();
    $email = $user->getEmail();
    $errorsPseudo = $user->getErrorPseudo();
    $errorsMail = $user->getErrorMail();

    $ErrPseudo = $errors->getErrorPseudo();
    $ErrPass = $errors->getErrorPass();
    $ErrConf = $errors->getErrorConf();
    $ErrEmail = $errors->getErrorEmail();
} else { */
    $pseudo = '';
    $email = '';
    $password = '';
    $confirm = '';

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
                                <input type="text" name="pseudo" id="pseudo" value="<?php echo $pseudo;?>" pattern="' ^[a-zA-Z0-9_]{4,11}$\ ^ '" required/>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="pseudo">Pseudo</label>
                                <span class="help-block">4 à 16 caractères, lettres et/ou chiffres</span>
                            </div>


                            <div class="group" style="max-width: 50%;">
                                <input type="password" name="password" id="password"  value="<?php echo $password;?>" pattern="' ^[a-zA-Z0-9_]{4,11}$\ ^ '">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="password">Mot de passe</label>
                                <span class="help-block">5 à 16 caractères, lettres et chiffres, caractères spéciaux</span>
                            </div>

                            <div class="group" style="max-width: 50%;">
                                <input type="password" name="confirm" id="confirm"  value="<?php echo $confirm;?>" pattern="' ^[a-zA-Z0-9_]{4,11}$\ ^ '">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="confirm">Confirmation du mot de passe</label>
                            </div>

                            <div class="group" style="max-width: 50%">
                                <input type="text" name="email" id="email"  value="<?php echo $email;?>" pattern="' ^.+@.+\.[a-zA-Z]{2,}$\ ^ '">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="email">E-mail</label>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="loginButton"></label>
                                <div class="col-sm-4">
                                    <button id="loginButton" name="loginButton" class="btn btn-primary" type="submit">Inscription</button>
                                </div>
                            </div>

                        </fieldset>
                    </form>
                <?php if(isset($_POST['loginButton'])):?>

                    <?php if(!preg_match(' ^[a-zA-Z0-9_]{4,11}$\ ^ ', $pseudo)):?>
                        <span style="color:indigo;">Votre pseudo ne respecte pas les règles</span>
                    <?php endif;?>

                    <?php if(!preg_match(' ^[a-zA-Z0-9_]{5,16}$\ ^ ', $password)):?>
                        <span style="color: indigo;">Votre mot de passe ne respecte pas les règles.</span>
                    <?php endif;?>

                    <?php if($password != $confirm):?>
                        <span style="color: indigo;">Vos mots de passe ne correspondent pas.</span>
                    <?php endif;?>

                    <?php if(!preg_match(' ^.+@.+\.[a-zA-Z]{2,}$\ ^ ', $email)):?>
                        <span style="color: indigo;">Votre e-mail est incorrect.</span>
                    <?php endif;?>

                <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>

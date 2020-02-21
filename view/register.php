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

                        <div class="row">


                            <div class="col">
                                <div class="form-group">
                                    <label for="pseudo">Pseudo</label>
                                    <input type="text" name="pseudo" id="pseudo" value="<?php echo $pseudo;?>" class="form-control"/>
                                    <small class="form-text text-muted">3 à 10 caractères.</small>
                                </div>

                                <div class="form-group">
                                    <label for="password1">Mot de passe</label>
                                    <input type="password" name="password" id="password1"  value="<?php echo $password;?>" class="form-control">
                                    <small class="form-text text-muted">5 à 16 caractères. </small>
                                </div>
                            </div>

                            <div class="col">

                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="text" name="email" id="email"  value="<?php echo $email;?>" class="form-control">
                                    <small class="form-text text-muted">Nous ne partagerons votre e-mail avec personne.</small>
                                </div>

                                <div class="form-group">
                                    <label for="confirm">Confirmation du mot de passe</label>
                                    <input type="password" name="confirm" id="confirm"  value="<?php echo $confirm;?>" class="form-control">
                                    <small class="form-text text-muted">Assurez-vous de ne pas avoir fait de fautes de frappe.</small>
                                </div>
                            </div>

                        </div>

                        <div class="d-flex justify-content-center">
                            <button id="loginButton" name="loginButton" class="btn btn-primary" type="submit">Inscription</button>
                        </div>

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

 <?php
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
                    <?php if (isset($error)): ?>
                        <?= $error;?>
                    <?php endif;?>
                    <form class="form-horizontal" method="post" action="register">


                        <div class="row">


                            <div class="col">

                                <div class="form-group">
                                    <label for="pseudo">Pseudo</label>
                                    <input type="text" name="pseudo" id="pseudo" value="<?= htmlspecialchars($pseudo);?>" class="form-control"/>
                                    <small class="form-text text-muted">3 à 10 caractères.</small>
                                </div>

                                <div class="form-group">
                                    <label for="password1">Mot de passe</label>
                                    <input type="password" name="password" id="password1"  value="<?php echo htmlspecialchars($password);?>" class="form-control">
                                    <small class="form-text text-muted">5 à 16 caractères. </small>
                                </div>

                            </div>

                            <div class="col">

                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="text" name="email" id="email"  value="<?php echo htmlspecialchars($email);?>" class="form-control">
                                    <small class="form-text text-muted">Nous ne partagerons votre e-mail avec personne.</small>
                                </div>

                                <div class="form-group">
                                    <label for="confirm">Confirmation du mot de passe</label>
                                    <input type="password" name="confirm" id="confirm"  value="<?php echo htmlspecialchars($confirm);?>" class="form-control">
                                    <small class="form-text text-muted">Assurez-vous de ne pas avoir fait de fautes de frappe.</small>
                                </div>
                            </div>

                        </div>

                        <div class="d-flex justify-content-center">
                            <button id="loginButton" name="loginButton" class="btn btn-primary" type="submit">Inscription</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

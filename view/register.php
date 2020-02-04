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

    $ErrPseudo = '';
    $ErrPass = '';
    $ErrConf = '';
    $ErrEmail = '';
}
?>



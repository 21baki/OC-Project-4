<?php

class ErrorManager extends Manager
{
    public function getEntityName()
    {
        return 'ErrorManager';
    }

    public function verifyRegistration($pseudo, $password, $confirm, $email)
    {
        $errors = new Error();

        if(!preg_match(' ^[a-zA-Z0-9_]{3,16}^ ', $pseudo)) {
            $errors->setErrorPseudo('Le pseudo choisi n\'est pas valide. Merci d\'en choisir un autre.');
            $errors->setClean('x');
        } else {
            echo 'le pseudo est valide </br>';
        }

        //TODO: Hasher le mot de passe
        if(!preg_match(' ^[a-zA-Z0-9_]{3,16}^ ', $password)) {
            $errors->setErrorPassword('Le mot de passe choisi n\'est pas valide. Merci de le renforcer.');
            $errors->setClean('x');
        } else {
            echo 'le mdp est valide </br>';
        }

        if($password != $confirm) {
            $errors->setErrorConf('Ne correspond pas au mot de passe défini.');
            $errors->setClean('x');
        }
        //strip tags à la place de preg_match
        if(!preg_match(' ^.+@.+\.[a-zA-Z]{2,}^ ', $email)) {
            $errors->setErrorEmail('L\'adresse email choisie n\'est pas valide. Merci d\'en choisir une autre.');
            $errors->setClean('x');
        } else {
            echo 'l\'adresse mail est valide';
        }

        var_dump(!preg_match(' ^[a-zA-Z0-9_]{3,16}$\ ^ ', $pseudo));
        var_dump(!preg_match(' ^[a-zA-Z0-9_]{3,16}$\ ^ ', $password));
        var_dump(!preg_match(' ^.+@.+\.[a-zA-Z]{2,}$\ ^ ', $email));


        return $errors;
    }
}

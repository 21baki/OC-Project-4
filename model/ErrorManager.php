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

        if(!preg_match(' ^[a-zA-Z0-9_]{4,16}$^ ', $pseudo)) {
            $errors->setErrorPseudo('Le pseudo choisi n\'est pas valide. Merci d\'en choisir un autre.');
            $errors->setClean('x');
        }
        //TODO: Hasher le mot de passe
        if(!preg_match(' ^[a-zA-Z0-9_]{5,16}$^ ', $password)) {
            $errors->setErrorPassword('Le mot de passe choisi n\'est pas valide. Merci de le renforcer.');
            $errors->setClean('x');
        }

        if($password != $confirm) {
            $errors->setErrorConf('Ne correspond pas au mot de passe défini.');
            $errors->setClean('x');
        }
        //strip tags à la place de preg_match
        if(!preg_match(' #^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$# ', $email)) {
            $errors->setErrorEmail('L\'adresse email choisie n\'est pas valide. Merci d\'en choisir une autre.');
            $errors->setClean('x');
        }


        return $errors;
    }
}

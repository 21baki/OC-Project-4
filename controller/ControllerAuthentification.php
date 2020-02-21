<?php



class ControllerAuthentification extends View
{
    private $manager;

    public function __construct()
    {
        $this->manager = new UserManager();
    }

    public function signIn($request)
    {
        $pseudo = $request->get('pseudo');
        $password = $request->get('password');
        $resultat = $this->manager->checkPseudoForLogin($pseudo);

        $resultat->getPassword();

        if(password_verify($password, $resultat->getPassword())) {
            $user = $this->manager->login($pseudo, $password);

            $userSession = new UserSession();
            $userSession->setPseudo($pseudo);
            $userSession->setRole($user->getRole());
            $this->redirect('home');
        } else {
            $this->render('login', array('error' => 'login ou mdp incorrect'));
        }

        $this->render('login', array('user' => $user));

        $vraiPseudo = strip_tags($_POST['pseudo']);


        var_dump($_POST);
    }

    public function signOut()
    {
        session_destroy();
        header('Location:index');
    }

    public function isValid($request)
    {
        /* if($this->userSession->logged()) {
             $this->redirect('home');
         } */

        $pseudo = $request->get('pseudo');
        $password = $request->get('password');
        $confirm = $request->get('confirm');
        $email = $request->get('email');

        if ($password === $confirm) {

            $manager = new UserManager();
            $user = $manager->verify($pseudo, $email);

            $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

            if (isset($errM) || isset($errP) || isset($errs)) {
                $user->setPseudo($pseudo);
                $user->setEmail($email);
            } else {
                $manager->register($pseudo, $passwordHashed, $email);
                $this->redirect('home');
            }
        } else {
            $this->render('register', array('error' => 'login ou mdp incorrect'));
        }

    }
}

<?php



class ControllerAuthentification extends View
{
    public function signIn($request)
    {
        $manager = new UserManager();

        $pseudo = $request->get('pseudo');
        $password = $request->get('password');
        $user = $manager->login($pseudo, $password);

        if(isset($user) && password_verify($password, $user->getPassword())) {

            $userSession = new UserSession();
            $userSession->setPseudo($pseudo);
            $userSession->setRole($user->getRole());
            $this->redirect('home');
        }

        $this->render('login', array('user' => $user));
    }

    public function signOut()
    {
        session_unset();
        header('Location:index');
    }

    public function isValid($request)
    {
        if($this->userSession->logged()) {
            $this->redirect('home');
        }

        $pseudo = $request->get('pseudo');
        $password = $request->get('password');
        $confirm = $request->get('confirm');
        $email = $request->get('email');

        $manager = new UserManager();
        $user = $manager->verify($pseudo, $email);

        var_dump($pseudo);



        if(isset($errM) || isset($errP) || isset($errs)) {
            $user->setPseudo($pseudo);
            $user->setEmail($email);
        } else {
            $manager->register($pseudo, $password, $email);
            $this->redirect('home');
        }
    }

}

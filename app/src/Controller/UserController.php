<?php

namespace App\Controller;

use App\Core\Factory\PDOFactory;
use App\Manager\UserManager;

class UserController extends BaseController
{
    
    /**
     * @Route(path="/users", name="listUsers")
     * @return void
     */
    public function getUsers()
    {
        $manager = new UserManager(PDOFactory::getInstance());

        $users = $manager->findAllUsers();

        $this->render('Frontend/User/show_all', ['users' => $users], 'Liste des utilisateurs');
    }

    /**
     * @Route(path="/user/{id}", name="showOneUser")
     * @param int $id
     * @return void
     */
    public function getUser(int $id)
    {
        $manager = new UserManager(PDOFactory::getInstance());

        $user = $manager->findById($id);

        $this->render('Frontend/User/show_user', ['user' => $user], 'Utilisateur: ' . $user->getFirstName());
    }

    /**
     * @Route(path="/register", name="register")
     * @return void
     */
    public function getRegister()
    {
        $this->render('Frontend/Auth/register', [], 'Register: ');
    }

    /**
     * @Route(path="/postRegister", name="postRegister")
     * @return void
     */
    public function postRegister()
    {
        var_dump($_POST);
        $manager = new UserManager(PDOFactory::getInstance());

        $manager->registerUser($_POST['email'], $_POST['password'], $_POST['firstName'], $_POST['lastName'], 0);

        $this->render('Frontend/Auth/register', [], 'Register: ');
    }

    /**
     * @Route(path="/login", name="login")
     * @return void
     */
    public function getLogin()
    {
        $user = 'user';

        $this->render('Frontend/Auth/login', ['user' => $user], 'Login: ');
    }
}

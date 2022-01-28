<?php

namespace App\Controller;

use App\Core\Factory\PDOFactory;
use App\Manager\UserManager;
use ErrorException;

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
        $this->render('Frontend/Auth/register', ['message' => null], 'Register: ');
    }

    /**
     * @Route(path="/postRegister", name="postRegister")
     * @return void
     */
    public function postRegister()
    {
        try {
            $manager = new UserManager(PDOFactory::getInstance());
            $message = $manager->register($_POST['email'], $_POST['password'], $_POST['firstName'], $_POST['lastName'], 0);
        } catch (ErrorException $error) {
            $message = $error->getMessage();
        }
        
        $this->render('Frontend/Auth/register', ['message' => $message], 'Register: ');
    }

    /**
     * @Route(path="/login", name="login")
     * @return void
     */
    public function getLogin()
    {
        $this->render('Frontend/Auth/login', ['message' => null], 'Login: ');
    }

    /**
     * @Route(path="/postLogin", name="postLogin")
     * @return void
     */
    public function postLogin()
    {
        try {
            $manager = new UserManager(PDOFactory::getInstance());
            $message = $manager->login($_POST['email'], $_POST['password']);
        } catch (ErrorException $error) {
            $message = $error->getMessage();
        }
        
        $this->render('Frontend/Auth/login', ['message' => $message], 'Login: ');
    }
}

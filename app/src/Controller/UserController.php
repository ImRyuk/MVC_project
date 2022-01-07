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
}

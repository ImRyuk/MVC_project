<?php

namespace App\Manager;

use App\Core\Factory\PDOFactory;
use App\Entity\User;

class UserManager extends BaseManager
{
    public function findAllUsers()
    {
        $query = 'SELECT * FROM users';
        $stmnt = $this->pdo->query($query);

        $results = $stmnt->fetchAll();

        $userArray = [];

        foreach ($results as $user) {
            array_push($userArray, new User($user));
        }
        return $userArray;
    }

    public function findById(int $id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id=:id");
        $stmt->execute(['id' => $id]);
        $user = $stmt->fetch();
        return new User($user);
    }

    public function delete(int $id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM users WHERE id=:id");
        $stmt->execute(['id' => $id]);
        $user = $stmt->fetch();
        return new User($user);
    }
}

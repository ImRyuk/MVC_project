<?php

namespace App\Manager;

use App\Core\Factory\PDOFactory;
use App\Entity\User;
use Error;
use ErrorException;

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

    public function registerUser($email, $password, $firstName, $lastName, $isAdmin)
	{
        $existingUser = $this->verifyMail($email);

        if(!$existingUser){
            $pass_hache = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->pdo->prepare('INSERT INTO users(email, password, firstName, lastName, admin ) VALUES(?, ?, ?, ?, ?)');
            $stmt->execute(array($email, $pass_hache, $firstName, $lastName, $isAdmin));

            if($stmt->rowCount() > 0) {
                return "User successfully created";
            } else {
                return "FAILED to execute INSERT query";
            }
        } else {
            throw new ErrorException("Email already exist!");
        }
        
       
	}

    public function verifyMail($email): bool
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email=:email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();
        if($user){
            return true;
        } else {
            return false;
        }
    }
}

<?php

namespace App\Manager;

use App\Core\Factory\PDOFactory;
use App\Entity\Post;

class PostManager extends BaseManager
{
    public function findAllPosts()
    {
        $query = 'SELECT * FROM Post';
        $stmnt = $this->pdo->query($query);

        $results = $stmnt->fetchAll();

        $postArray = [];

        foreach ($results as $post) {
            array_push($postArray, new Post($post));
        }
        return $postArray;
    }

    public function findOnePost(int $id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Post WHERE id=:id");
        $stmt->execute(['id' => $id]);
        $user = $stmt->fetch();
        return new Post($user);
    }
}

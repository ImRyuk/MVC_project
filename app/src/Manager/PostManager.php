<?php

namespace App\Manager;

use App\Core\Factory\PDOFactory;
use App\Entity\Post;

class PostManager extends BaseManager
{
    public function findAllPosts()
    {
        $query = 'SELECT * FROM posts';
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
        $stmt = $this->pdo->prepare("SELECT * FROM posts WHERE id=:id");
        $stmt->execute(['id' => $id]);
        $post = $stmt->fetch();
        return new Post($post);
    }
}

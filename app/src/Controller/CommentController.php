<?php

namespace App\Controller;

use App\Core\Factory\PDOFactory;

class CommentController extends BaseController
{
    /**
     * @Route(path="/article/{id}", name="showOnePost")
     * @param int $id
     * @return void
     */
    public function getComments(int $id)
    {
        $manager = new CommentManager(PDOFactory::getInstance());

        $comments = $manager->findOneBy('id', $id);

        $this->render('Frontend/Post/show_post', ['comments' => $comments], 'commentaires');
    }
}
<?php

namespace App\Controller;

use App\Core\Factory\PDOFactory;
use App\Manager\PostManager;

class PostController extends BaseController
{
    /**
     * @Route(path="/", name="homePage")
     * @return void
     */
    public function getHome()
    {
        $manager = new PostManager(PDOFactory::getInstance());

        $posts = $manager->findAllPosts();

        $this->render('Frontend/home', ['francis' => $posts], 'le titre de la page');
    }

    /**
     * @Route(path="/article/{id}", name="showOnePost")
     * @param int $id
     * @return void
     */
    public function getShow(int $id)
    {
        $manager = new PostManager(PDOFactory::getInstance());

        $post = $manager->findOnePost($id);

        $this->render('Frontend/Post/show_post', ['post' => $post], 'le titre de la page');
    }
}

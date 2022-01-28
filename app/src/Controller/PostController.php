<?php

namespace App\Controller;

use App\Core\Factory\PDOFactory;
use App\Entity\Post;
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

        $this->render('Frontend/home', ['posts' => $posts], 'le titre de la page');
    }

    /**
     * @Route(path="/article/{id}", name="showOnePost")
     * @param int $id
     * @return void
     */
    public function getShow(int $id)
    {
        $manager = new PostManager(PDOFactory::getInstance());

        $post = $manager->findById($id);

        $this->render('Frontend/Post/show_post', ['post' => $post], 'le titre de la page');
    }

    /** ADMIN SECTION */

    /**
     * @Route(path="/dashboard/article", name="showAdminPosts")
     * @return void
     */
    public function getAdminPosts()
    {
        $manager = new PostManager(PDOFactory::getInstance());

        $posts = $manager->findAllPosts();

        $this->render('Frontend/Post/Dashboard/show_all', ['posts' => $posts], 'Posts list');
    }

    /** ADMIN SECTION */

    /**
     * @Route(path="/deletePost/{id}", name="deleteOnePost")
     * @param int $id
     * @return void
     */
    public function getDeletePost(int $id)
    {
        $manager = new PostManager(PDOFactory::getInstance());

        $message = $manager->delete($id);

        /** Redirect */

        $manager = new PostManager(PDOFactory::getInstance());

        $posts = $manager->findAllPosts();

        $this->render('Frontend/Post/Dashboard/show_all', ['posts' => $posts, 'message' => $message], 'Posts list');
    }
}

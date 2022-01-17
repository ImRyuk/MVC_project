<h1>Je suis la page d'accueil</h1>


<?php
/** @var $posts Post */

use App\Entity\Post;
foreach ($posts as $post){

echo $post->getTitle();
}

?>

<?php
/** @var $post Post */

use App\Entity\Post;
use App\Entity\Comment;

?>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12 mx-auto text-center mt-5 mb-5">
            <h2><?php echo $post->getTitle() ?></h2>
            <p>Ecrit par <?php echo $post->getAuthor()->getFirstName() ?> le <?php echo date_format($post->getCreatedAt(),"Y/m/d H:i"); ?></p>
            <p><?php echo $post->getContent() ?></p>
        </div>
        <h3>Commentaires:</h3>
        <div>
            <ul>
                <?php /** @var $comments Comment[] */
                foreach ($comments as $comment) : ?>
                    <li><p><?= $comment->getContent(); ?></p></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <form action="/article/<?= $post->getId() ?>" method="POST">
            <div class="form-floating">
                <textarea class="form-control" placeholder="Laisser un commentaire" id="floatingTextarea"></textarea>
                <label for="floatingTextarea">Commentaire</label>
            </div>
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary text-center">Submit</button>
            </div>
        </form>
    </div>
</div>

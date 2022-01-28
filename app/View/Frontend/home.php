<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8 mx-auto">
            <h1 class="text-center mt-5 mb-5">Je suis la page d'accueil</h1>
            <?php
            /** @var $posts Post */

            use App\Entity\Post;

            foreach ($posts as $post): ?>
                <div class="card mb-4">
                  <div class="card-body">
                    <h5 class="card-title"><?= $post->getTitle();?></h5>
                    <p class="card-text"><?= substr($post->getContent(), -150);?></p>
                    <a href="#" class="btn btn-primary">Lire l'article</a>
                  </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

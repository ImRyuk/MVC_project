<?php
/** @var $post \App\Entity\Post */
//echo $post->getTitle();
?>

<div class="container">
    <h1 class="h1 text-center">Article <?echo $post->getId() ?></h1>
    <div class="row">
        <div class="col">
            <h2 class="h2"><?echo $post->getTitle() ?></h2>
        </div
    </div>
    <div class="row">
        <div class="col">
            <p>Ecrit par <?echo $post->getAuthor()->getFirstName() ?> le <?echo date_format($post->getCreatedAt(),"Y/m/d H:i"); ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p><?echo $post->getContent() ?></p>
        </div
    </div>
</div>

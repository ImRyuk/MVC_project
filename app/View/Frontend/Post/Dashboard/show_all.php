<?php
/** @var $posts \App\Entity\Post */
/** @var $message string */
?>

<div class="container">
    <h1 class="h1 text-center">List Posts</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">created At</th>
            <th scope="col">Title</th>
            <th scope="col">authorID</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($posts as $post): ?>
            <tr>
                <th scope="row"><?= $post->getId(); ?></th>
                <td><?= $post->getCreatedAt()->format('Y-m-d H:i') ?></td>
                <td><?= $post->getTitle(); ?></td>
                <td><?= $post->getAuthorId(); ?></td>
                <td class="contact-delete">
                    <form action="/deletePost/<?= $post->getId()?>" action="GET">
                        <input type="hidden" name="name" value="<?php echo $post->getId(); ?>">
                        <input type="submit" class="btn btn-danger" name="submit" value="Delete">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
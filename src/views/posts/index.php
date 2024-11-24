<?php require __DIR__ . '/head.php'; ?>

    <?php foreach ($posts as $post): ?>
        <div class="post">
            <h2><a href="/post/<?= $post['id'] ?>"><?= $post['title'] ?></a></h2>
            <p><?= $post['content'] ?></p>
        </div>
    <?php endforeach; ?>

    <?php require __DIR__ . '/../footer.php'; ?>

<?php require __DIR__ . '/head.php'; ?>

    <?php foreach ($posts as $post): ?>
        <div class="post">
            <h2><a href="/post/<?= $post['id'] ?>"><?= $post['title'] ?></a></h2>
            <div class="date-info">Créé le: <?= date('Y-m-d H:i:s', strtotime($post['created_at'])) ?>, Mis à jour le: <?= date('Y-m-d H:i:s', strtotime($post['updated_at'])) ?></div>
            <p><?= $post['content'] ?></p>
        </div>
    <?php endforeach; ?>

    <?php require __DIR__ . '/../footer.php'; ?>

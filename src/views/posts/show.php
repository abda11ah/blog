<?php require __DIR__ . '/head.php'; ?>

    <?php if ($post): ?>
        <h2><?= $post['title'] ?></h2>
        <p><?= $post['content'] ?></p>
    <?php else: ?>
        <p>Article non trouvé.</p>
    <?php endif; ?>

    <?php require __DIR__ . '/../footer.php'; ?>

<?php require __DIR__ . '/head.php'; ?>

    <?php if ($post): ?>
        <h2><?= $post['title'] ?></h2>
        <div class="date-info">Créé le: <?= date('Y-m-d H:i:s', strtotime($post['created_at'])) ?>, Mis à jour le: <?= date('Y-m-d H:i:s', strtotime($post['updated_at'])) ?></div>
        <p><?= $post['content'] ?></p>
    <?php else: ?>
        <p>Article non trouvé.</p>
    <?php endif; ?>

    <?php require __DIR__ . '/../footer.php'; ?>

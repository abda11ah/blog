<style>
        body { font-family: sans-serif; }
        h2 { margin-top: 0; }
    </style>
    <?php if ($post): ?>
        <h2><?= $post['title'] ?></h2>
        <p><?= $post['content'] ?></p>
    <?php else: ?>
        <p>Article non trouvé.</p>
    <?php endif; ?>

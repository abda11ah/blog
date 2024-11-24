<?php require __DIR__ . '/head.php'; ?>

    <form method="post" action="/admin/update/<?= $post['id'] ?>">
        <label for="title">Titre:</label><br>
        <input type="text" id="title" name="title" value="<?= $post['title'] ?>"><br>
        <label for="content">Contenu:</label><br>
        <textarea id="content" name="content"><?= $post['content'] ?></textarea><br><br>
        <input type="submit" value="Mettre à jour">
    </form>

    <?php require __DIR__ . '/../footer.php'; ?>

<?php require __DIR__ . '/head.php'; ?>

    <h1>Panneau d'administration</h1>
    <div class="admin-links">
        <a href="/admin/create">Créer un article</a>
        <a href="/admin/logout">Logout</a>
    </div>
    <?php
    $posts = \App\Models\Post::all($this->get('db'));
    foreach ($posts as $post): ?>
        <div class="post">
            <a href="/post/<?= $post['id'] ?>"><?= $post['title'] ?></a>
            <a href="/admin/edit/<?= $post['id'] ?>">Modifier</a>
            <a href="/admin/delete/<?= $post['id'] ?>">Supprimer</a>
        </div>
    <?php endforeach; ?>

    <?php require __DIR__ . '/../footer.php'; ?>

<style>
        body { font-family: sans-serif; }
        h1 { text-align: center; }
        a { display: block; margin-bottom: 10px; text-decoration: none; color: #333; }
        div { border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; }
    </style>
    <h1>Panneau d'administration</h1>
    <a href="/admin/create">Créer un article</a>
    <a href="/admin/logout">Logout</a>
    <?php
    $posts = \App\Models\Post::all($this->get('db'));
    foreach ($posts as $post): ?>
        <div>
            <a href="/post/<?= $post['id'] ?>"><?= $post['title'] ?></a>
            <a href="/admin/edit/<?= $post['id'] ?>">Modifier</a>
            <a href="/admin/delete/<?= $post['id'] ?>">Supprimer</a>
        </div>
    <?php endforeach; ?>

<style>
        body { font-family: sans-serif; }
        div { border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; }
        h2 { margin-top: 0; }
    </style>
    <?php foreach ($posts as $post): ?>
        <div>
            <h2><a href="/post/<?= $post['id'] ?>"><?= $post['title'] ?></a></h2>
            <p><?= $post['content'] ?></p>
        </div>
    <?php endforeach; ?>

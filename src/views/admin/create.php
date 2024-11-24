<?php require __DIR__ . '/head.php'; ?>

    <form method="post" action="/admin/create">
        <label for="title">Titre:</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="content">Contenu:</label><br>
        <textarea id="content" name="content"></textarea><br><br>
        <input type="submit" value="Soumettre">
    </form>

    <?php require __DIR__ . '/../footer.php'; ?>

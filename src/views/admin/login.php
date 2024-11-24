<?php require __DIR__ . '/head.php'; ?>

    <form method="post" action="/admin/login">
        <label for="username">Nom d'utilisateur:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Mot de passe:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Connexion">
    </form>

    <?php require __DIR__ . '/../footer.php'; ?>

<?php require __DIR__ . '/head.php'; ?>

    <form method="post" action="/admin/login">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>

    <?php require __DIR__ . '/../footer.php'; ?>

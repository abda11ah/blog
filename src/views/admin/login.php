<style>
        body { font-family: sans-serif; }
        form { display: block; width: 300px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], input[type="password"] { width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; box-sizing: border-box; }
        input[type="submit"] { background-color: #4CAF50; color: white; padding: 10px 15px; border: none; cursor: pointer; }
    </style>
    <form method="post" action="/admin/login">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>

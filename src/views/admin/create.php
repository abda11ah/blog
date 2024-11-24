<style>
        body { font-family: sans-serif; }
        form { display: block; width: 500px; margin: 0 auto; padding: 20px; border: 1px solid #ccc; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], textarea { width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ccc; box-sizing: border-box; }
        input[type="submit"] { background-color: #4CAF50; color: white; padding: 10px 15px; border: none; cursor: pointer; }
    </style>
    <form method="post" action="/admin/create">
        <label for="title">Titre:</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="content">Contenu:</label><br>
        <textarea id="content" name="content"></textarea><br><br>
        <input type="submit" value="Soumettre">
    </form>

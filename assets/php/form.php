<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Pattern</title>
</head>
<body>
    <h1>Ajouter un Pattern</h1>
    <form action="savePattern.php" method="post">
        <div>
            <label for="title">Titre :</label>
            <input type="text" id="title" name="title" required>
        </div>
        <br>
        <div>
            <label for="description">Description :</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <br>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>

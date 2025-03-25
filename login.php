<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Krochet & Cnit</title>
</head>
<body>
    <form action="/assets/php/login.php" method="post">
        <label>
        <?= $t['login']['email']?>
            <input type="text" name="email">
        </label>
        <label>
            <?= $t['login']['passphrase']?>
            <input type="password" name="passphrase">
        </label>
        <button><?= $t['login']['login']?> </button>
    </form>
    
</body>
</html>
<?php
require_once 'assets/locales/trad.php';
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Krochet & Cnit - Login</title>
</head>
<body>

  <form action="/assets/php/login.php" method="post" aria-describedby="loginInfo">
    <h1><?= $t['login']['login'] ?></h1>

    <?php if (isset($_SESSION['error'])): ?>
      <p id="loginInfo" style="color: red"><?= $_SESSION['error'] ?></p>
      <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <label for="email"><?= $t['login']['email'] ?></label>
    <input type="email" name="email" id="email" required>

    <label for="passphrase"><?= $t['login']['passphrase'] ?></label>
    <input type="password" name="passphrase" id="passphrase" required>

    <button type="submit"><?= $t['login']['login'] ?></button>
  </form>

</body>
</html>

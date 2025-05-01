<?php
session_start();
require_once 'assets/locales/trad.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="/assets/pics/favicon.png">
  <link rel="stylesheet" href="/assets/css/login_style.css">
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title>Krochet & Cnit - Login</title>
</head>
<body>

  <button class="croix-fermer" onclick="window.location.href='/index.php'">
    <i class="fa-solid fa-xmark"></i>
  </button>

  <form action="/assets/php/login.php" method="post" aria-describedby="loginInfo" autocomplete="on">
    <h1><?= $t['login']['login'] ?></h1>

    <div class="container">
    <?php if (isset($_SESSION['error'])): ?>
      <div class="error-message">
        <i class="fas fa-exclamation-circle"></i>
        <p id="loginInfo"><?= $_SESSION['error'] ?></p>
      </div>
      <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <label for="email"><?= $t['login']['email'] ?></label>
    <input type="email" name="email" id="email" required autocomplete="email">

    <label for="passphrase"><?= $t['login']['passphrase'] ?></label>
    <input type="password" name="passphrase" id="passphrase" required autocomplete="current-password">

    <button type="submit"><?= $t['login']['login'] ?></button>
    <p><?= $t['login']['pascompte'] ?> ? <a href="/register.php"><?= $t['login']['creer'] ?></a></p>
    </div>
  </form>

</body>
<script defer src="/assets/js/modal.js" type="module"></script>
</html>

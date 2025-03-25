<?php
require_once 'assets/locales/trad.php';
require_once 'assets/php/session.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Inscription</title>
  <link rel="stylesheet" href="/assets/css/login_style.css">
  <link rel="stylesheet" href="/assets/css/style.css">
  <title>Krochet & Cnit - Register</title>
</head>
<body>

  <form action="/assets/php/signIn.php" method="post">
    <h1>Créer un compte</h1>
    <div class="container">

    <?php if (isset($_SESSION['error'])): ?>
      <p style="color:red"><?= $_SESSION['error'] ?></p>
      <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <label for="email"><?= $t['login']['email'] ?> :</label>
    <input type="email" name="email" id="email" required>

    <label for="passphrase"><?= $t['login']['passphrase'] ?> :</label>
    <input type="password" name="passphrase" id="passphrase" required>

    <button type="submit"><?= $t['login']['creer'] ?></button>

    <p>Déjà un compte ? <a href="/login.php">Se connecter</a></p>
    </div>
  </form>

</body>
</html>

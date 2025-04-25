<?php
require_once 'assets/locales/trad.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Inscription</title>
  <link rel="stylesheet" href="/assets/css/login_style.css">
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="icon" type="image/x-icon" href="/assets/pics/favicon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <title>Krochet & Cnit - Register</title>
</head>
<body>
<button class="croix-fermer" onclick="window.location.href='/index.php'">
    <i class="fa-solid fa-xmark"></i>
  </button>

  <form action="/assets/php/signIn.php" method="post">
    <h1>Créer un compte</h1>
    <div class="container">

    <?php if (isset($_SESSION['error'])): ?>
  <div class="error-message">
    <i class="fas fa-exclamation-circle"></i>
    <p id="loginInfo"><?= $_SESSION['error'] ?></p>
  </div>
  <?php unset($_SESSION['error']); ?>
<?php endif; ?>

    <label for="email"><?= $t['login']['email'] ?></label>
    <input type="email" name="email" id="email" required>

    <label for="passphrase"><?= $t['login']['passphrase'] ?></label>
    <input type="password" name="passphrase" id="passphrase" required>

    <button type="submit"><?= $t['login']['creer'] ?></button>

    <p>Déjà un compte ? <a href="/login.php"><?= $t['login']['login'] ?> </a></p>
    </div>
  </form>

</body>
</html>

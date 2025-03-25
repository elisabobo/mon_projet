<?php
require_once 'assets/php/session.php';

if (!$isLogged) {
    header('Location: /login.php');
    die();
}
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Document</title>
</head>
<body>
<h1>Page d'admin</h1>
</body>
</html>

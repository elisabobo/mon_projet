<?php
session_start();
require_once 'Security.php';

$security = new Security();
$isLogged = $security->login($_POST['email'], $_POST['passphrase']);

if ($isLogged) {
    $_SESSION['isLogged'] = true; // optionnel si tu veux vraiment garder ce flag
    header('Location: /');
    exit;
} else {
    header('Location: /login.php?error=1');
    exit;
}

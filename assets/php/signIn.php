<?php
session_start();
require_once 'Security.php';

$email = htmlspecialchars($_POST['email']);
$passphrase = $_POST['passphrase'];
$hashedPassword = password_hash($passphrase, PASSWORD_DEFAULT);
$security = new Security();

try {
    $security->signIn($email, $hashedPassword);
    header("Location: /login.php?signup=success");
    exit;
} catch (PDOException $e) {
    $_SESSION['error'] = "L'adresse e-mail est déjà utilisée.";
    header('Location: /register.php');
    exit;
}

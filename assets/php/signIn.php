<?php
require_once 'Security.php';

$email = htmlspecialchars($_POST['email']);
$passphrase = $_POST['passphrase'];
$hashedPassword = password_hash($passphrase, PASSWORD_DEFAULT);
$security = new Security();
$security->signIn($email, $hashedPassword);

header("Location: ../crochet.php");
exit;

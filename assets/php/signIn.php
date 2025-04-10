<?php
require_once 'Security.php';

$email = htmlspecialchars($_POST['email']);
$passphrase = $_POST['passphrase'];
$hashedPassword = password_hash($passphrase, PASSWORD_DEFAULT);
$security = new Security();

try {
    $security->signIn($email, $hashedPassword);
    
    $user = $security->getUserByEmail($email);  
    $_SESSION['id'] = $user['id'];  

    header("Location: /index.php");
    exit;

} catch (PDOException $e) {
    $_SESSION['error'] = "L'adresse e-mail est déjà utilisée.";
    header('Location: /register.php');
    exit;
}
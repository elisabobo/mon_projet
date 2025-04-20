<?php
session_start();
require_once 'Security.php';
require_once '../locales/trad.php';

// Récupération des données de l'utilisateur
$email = htmlspecialchars($_POST['email']);
$passphrase = $_POST['passphrase'];
$hashedPassword = password_hash($passphrase, PASSWORD_DEFAULT);  // Hachage du mot de passe

$security = new Security();

try {
    // Vérification si l'email existe déjà
    if ($security->getUserByEmail($email)) {
        // Si l'email existe déjà, on redirige avec un message d'erreur
        $_SESSION['error'] = $t['signin']['deja_utilise'];
        header('Location: /register.php');
        exit;
    }

    $security->signIn($email, $hashedPassword);

    $user = $security->getUserByEmail($email);

    $_SESSION['isLogged'] = true;
    $_SESSION['id'] = $user['id'];
    $_SESSION['email'] = $user['email'];  

    header("Location: /index.php");
    exit;

} catch (PDOException $e) {
    $_SESSION['error'] = $t['signin']['erreur_inscription'];
    header('Location: /register.php');
    exit;
}
?>
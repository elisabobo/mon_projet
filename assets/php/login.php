<?php

session_start(); 
require_once 'Security.php';
require_once '../locales/trad.php';  

//recup donnees du form
$email = $_POST['email'] ?? '';
$passphrase = $_POST['passphrase'] ?? '';

$security = new Security();

//verif
$user = $security->getUserByEmail($email);
if ($user) {
    var_dump("user existe");
    //verif mdp
    if ($security->verifyPassword($email, $passphrase)) {
       //si c ok
        $_SESSION['isLogged'] = true;
        $_SESSION['id'] = $user['id'];
        $_SESSION['email'] = $user['email']; 

        
        header('Location: /');
        exit;
    } else {
        
        $_SESSION['error'] = $t['login']['mdp_incorrect'];
        header('Location: /login.php');
        exit;
    }
} else {
    var_dump("user existe PAS");
    // si l'email n existe pas dans la base de donnes
    $_SESSION['error'] = $t['login']['email_incorrect'];
    header('Location: /login.php');
    exit;
}
?>
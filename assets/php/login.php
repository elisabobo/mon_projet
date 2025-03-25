<?php
session_start();
require_once 'Security.php';

$security = new Security();
$isLogged = $security->login($_POST['email'], $_POST['passphrase']);

$_SESSION['isLogged'] = 'true';

header('Location: /');

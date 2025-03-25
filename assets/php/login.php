<?php

require_once 'Security.php';

$email=htmlspecialchars((string)$_POST["email"]);
$password=$_POST["password"];
var_dump(password_hash($password,algo:PASSWORD_DEFAULT));


$security=new Security();

<?php
require_once 'Pattern.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = htmlspecialchars($_POST['title']);
$description = htmlspecialchars($_POST['description']);
$type = isset($_POST['type']) ? htmlspecialchars($_POST['type']) : 'defaut';
$pic = isset($_POST['pic']) ? htmlspecialchars($_POST['pic']) : 'defaut.png';
$difficulty = htmlspecialchars($_POST['difficulte']);

//vérif
if (strlen($title) > 250 || $title === '' || $description === '') {
    header('Location: crochet.php');
    exit();
}


$picPath = 'assets/pics/pattern_img/' . $pic;
if (!file_exists($picPath)) {
    $pic = 'defaut.png';
}

$pattern = new Pattern();
$pattern->save($title, $description, $type, $pic, $difficulty);


header('Location: crochet.php');
exit();
?>

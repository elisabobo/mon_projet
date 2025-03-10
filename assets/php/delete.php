<?php
require_once 'assets/php/Pattern.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $patternInstance = new Pattern();
    $patternInstance->delete($id);
}

header('Location: crochet.php');
exit();
?>

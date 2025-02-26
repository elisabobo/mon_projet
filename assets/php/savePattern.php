<?php

require_once 'Pattern.php';
$title=htmlspecialchars($_POST['title']);
$description=htmlspecialchars($_POST['description']);

//faire un triple egal
if (strlen($title)<=250 || $title== '' || $description == ''){
    
    //http_response_codea(400);
    header('Location: ../../index.php');
    exit();
}

$pattern= new Pattern();

$pattern->save($title, $description);
header('Location: ../../index.php');
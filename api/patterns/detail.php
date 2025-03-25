<?php

$id = 1;

require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/php/Pattern.php';

$patternObj = new Pattern();
echo json_encode($patternObj->get($_GET['id']));

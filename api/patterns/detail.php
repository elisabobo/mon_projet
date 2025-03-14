<?php

$id = 1;

require_once $_SERVER['DOCUMENT_ROOT'] . '/assets/php/Pattern.php';

$recipeObj = new Recipe();
echo json_encode($recipeObj->get($_GET['id']));

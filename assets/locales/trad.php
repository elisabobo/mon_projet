<?php

$availableLangs = ['fr', 'en'];
$lang = $_COOKIE['lang'] ?? 'fr';

if (!in_array($lang, $availableLangs, true)) {
    $lang = 'fr';
}

require_once __DIR__ . "/$lang.php";

<?php

$availableLangs = ['fr', 'en'];
$lang = $_GET['lang'] ?? 'fr';

if (!in_array($lang, $availableLangs, true)) {
    $lang = 'fr';
}

$isSecure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');

setcookie(
    'lang',
    $lang,
    time() + 3600 * 24 * 365,
    '/',
    '',
    $isSecure,
    true,
);

header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? '/'));
exit;

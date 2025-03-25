<?php

setcookie(
    'lang',
    $_GET['lang'],
    time() + 3600 * 24 * 365,
    '/',
    '',
    true,
    true,
);

header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? '/'));
exit;
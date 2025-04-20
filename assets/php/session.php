<?php

session_start();
if (!isset($_SESSION['isLogged'])) {
    $_SESSION['isLogged'] = false;
}

$isLogged = $_SESSION['isLogged'] === 'true';
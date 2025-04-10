<?php
session_start();
$isLogged = isset($_SESSION['id']) && !empty($_SESSION['id']);

<?php

$pdo = new PDO('sqlite:' . __DIR__ . '/db.sqlite');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->exec('CREATE TABLE IF NOT EXISTS patterns (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title VARCHAR NOT NULL,
    pic VARCHAR NOT NULL,
    text TEXT NOT NULL

)');

$query = $pdo->query('SELECT * FROM patterns');
$patterns = $query->fetchAll();

foreach ($patterns as $pattern) {
    ?>
    <li><?php echo $pattern['title']; ?></li>
    <?php
}
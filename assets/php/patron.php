<?php
require_once '../locales/trad.php';
require_once 'Pattern.php';
require_once 'session.php';

if (!isset($_GET['id'])) {
    echo "Aucun identifiant fourni.";
    exit;
}

$patternInstance = new Pattern();
$patron = $patternInstance->get((int) $_GET['id']);

if (!$patron) {
    echo "Patron introuvable.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($patron['title']) ?></title>
    <link rel="icon" type="image/x-icon" href="/assets/pics/favicon.png">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script defer src="/assets/js/getPattern.js" type="module"></script>
</head>
<body>

    <main class="patron-details">
        <h1><?= htmlspecialchars($patron['title']) ?></h1>
        <img src="/assets/php/<?= htmlspecialchars($patron['pic']) ?>" alt="<?= htmlspecialchars($patron['title']) ?>" class="pattern-image">
        <p><?= nl2br(htmlspecialchars($patron['text'])) ?></p>
        <p>Difficulté : <?= htmlspecialchars($patron['difficulty']) ?></p>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
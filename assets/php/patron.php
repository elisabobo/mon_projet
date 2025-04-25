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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script defer src="/assets/js/getPattern.js" type="module"></script>
</head>
<body>
<button type="submit">
    <i class="fa-solid fa-arrow-left" title="Next Page"></i>
</button>

    <main class="patron-details">
        <h1><?= htmlspecialchars($patron['title']) ?></h1>
        <img src="/assets/php/<?= htmlspecialchars($patron['pic']) ?>" alt="<?= htmlspecialchars($patron['title']) ?>" class="pattern-image">
        <p><?= nl2br(htmlspecialchars($patron['text'])) ?></p>
        <p>Difficulté : <?= htmlspecialchars($patron['difficulty']) ?></p>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>
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
<html lang="<?= htmlspecialchars($lang) ?>">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($patron['title']) ?></title>
    <link rel="icon" type="image/x-icon" href="/assets/pics/favicon.png">
    <link rel="stylesheet" href="/assets/css/patron_indiv_style.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script defer src="/assets/js/getPattern.js" type="module"></script>
</head>
<body>
<button type="button" onclick="history.back()">
    <i class="fa-solid fa-arrow-left"></i>
</button>

<main>
    <section>
    <article>
    <img src="/assets/php/<?= htmlspecialchars($patron['pic']) ?>" alt="<?= htmlspecialchars($patron['title']) ?>" class="pattern-image">

    <div class="pattern-info">
      <h1><?= htmlspecialchars($patron['title']) ?></h1>
      <p>Difficulté : <?= htmlspecialchars($patron['difficulty']) ?></p>
      <p>Description : <?= nl2br(htmlspecialchars($patron['text'])) ?></p>
    </div>
  </article>

    </section>

</main>

    <?php include 'footer.php'; ?>
</body>
</html>

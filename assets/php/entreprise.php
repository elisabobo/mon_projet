<?php
require_once '../locales/trad.php';

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
    <script defer src="/assets/js/corpo_rating.js" type="module"></script>
</head>
<body>
<button type="button" onclick="history.back()">
    <i class="fa-solid fa-arrow-left"></i>
</button>

<main>
    <section>
    <article>
    <div class="entreprise-info">
      <h1 id="nom_entreprise"></h1>
      <p>Score de l'entreprise :</p>
    </div>
  </article>

    </section>

</main>

    <?php include 'footer.php'; ?>
</body>
</html>

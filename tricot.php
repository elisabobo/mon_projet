<?php
require_once 'assets/php/Pattern.php';
require_once 'assets/locales/trad.php';

$patternInstance = new Pattern();
$patterns = $patternInstance->getByType('tricot');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <!-- Icônes réseaux sociaux -->
    <link rel="icon" type="image/x-icon" href="/assets/pics/favicon.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- POLICE -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/modal_style.css">
    <link rel="stylesheet" href="/assets/css/pattern_style.css">
    <link rel="stylesheet" href="/assets/css/style.css">

    <title>Krochet & Cnit</title>
</head>
<body>
    <header>
        <?php include 'assets/php/navbar.php'; ?>

    </header>
    <main>
    <section>
        <!-- Bouton d'ouverture du modal pour ajouter un patron -->
        <?php include 'assets/php/modal.php'; ?>
    </section>
    <section>
            <ul class="patterns">
                <?php foreach ($patterns as $pattern): ?>
                    <li>
                    <article class="pattern-card">
                        <h2 class="pattern-title"><?php echo htmlspecialchars($pattern['title']); ?></h2>
                        <img alt="" class="pattern-image" src="assets/php/<?php echo htmlspecialchars($pattern['pic']); ?>" ...>
    </article>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
    </main>
    <?php include 'assets/php/footer.php'; ?>

        <script defer src="assets/js/getPattern.js" type="module"></script>
        <script defer src="assets/js/main.js" type="module"></script>
        <script defer src="/assets/js/modal.js" type="module"></script>
</body>
</html>


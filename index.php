<?php
require_once 'assets/locales/trad.php';
require_once 'assets/php/Pattern.php';
require_once 'assets/php/session.php';

$patternInstance = new Pattern();
$patterns = $patternInstance->getAll();
/*require_once 'assets/php/Security.php';
$security = new Security();
$users = $security->getAllUsers(); 
echo '<pre>';  // Pour améliorer la lisibilité du var_dump
var_dump($users);
echo '</pre>';*/
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="icon" type="image/x-icon" href="/assets/pics/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <!--Icones réseaux sociaux -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
    <!--POLICE -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Krochet & Cnit</title>
</head>
<body>
    <header> 
        <nav>
            <!-- NAVBAR -->
            <?php include 'assets/php/navbar.php'; ?>
        </nav>
    </header>

    <main>
        <section>
            <h2>en cours</h2>
            <p>en cours d'inspi de home page </p>
        </section>
    </main>

    <footer>
        <?php include 'assets/php/footer.php'; ?>
    </footer>
    <script defer src="/assets/js/main.js" type="module"></script>
    <script defer src="assets/js/getPattern.js" type="module"></script>
</body>
</html>

<?php
require_once 'assets/locales/trad.php';
require_once 'assets/php/Pattern.php';
/// COPIER DANS LE TERMINAL -> php -S localhost:8000
// COPIER DANS SAFARI -> http://localhost:8000
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
<html lang="<?= htmlspecialchars($lang) ?>">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--favicon-->
    <link rel="icon" type="image/x-icon" href="/assets/pics/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <!--Icones réseaux sociaux -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
    <!--POLICE -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>company</title>
</head>
<body>
    <header> 
            <!-- NAVBAR -->
            <?php include 'assets/php/navbar.php'; ?>
    </header>

    <main>
    <section class="home_background">
        <div class="home_content">
            <h1><?=$t['index']['bienvenue']?></h1>
            <p><?=$t['index']['decouvre']?></p>
            <div class="home_buttons">
                <a href="/entreprise.php" class="home_btn"><?=$t['index']['bouton']?></a>
            </div>
        </div>
</section>

</main>
    
        <?php include 'assets/php/footer.php'; ?>

    <script defer src="/assets/js/main.js" type="module"></script>
    <script defer src="assets/js/getPattern.js" type="module"></script>
</body>
</html>

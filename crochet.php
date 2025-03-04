<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <!--Icones réseaux sociaux -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
    <!--POLICE -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/modal_style.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Krochet & Cnit</title>
    <script defer src="assets/js/main.js" type="module"></script>
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
            <button id="myBtn">Ajouter un patron</button>
            <?php include 'assets/php/modal.php'; ?>
            
        </section>
    </main>
   
    <footer>
        <?php include 'assets/php/footer.php'; ?>  
    </footer>

    
</body>
</html>

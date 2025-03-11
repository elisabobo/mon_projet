<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Pattern.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Validation du type de patron (doit être "crochet" ou "tricot")
    if (empty($_POST['type']) || !in_array($_POST['type'], ['crochet', 'tricot'])) {
        $errors[] = "Type de patron invalide.";
    } else {
        $type = $_POST['type'];
    }

    // Validation du titre
    if (empty(trim($_POST['title']))) {
        $errors[] = "Le titre est requis.";
    } else {
        $title = trim($_POST['title']);
    }

    // Validation du niveau de difficulté (doit être "debutant", "intermediaire" ou "avance")
    if (empty($_POST['difficulte']) || !in_array($_POST['difficulte'], ['debutant', 'intermediaire', 'avance'])) {
        $errors[] = "Niveau de difficulté invalide.";
    } else {
        // On passe en variable $difficulty pour être en accord avec la méthode de la classe
        $difficulty = $_POST['difficulte'];
    }

    // Validation de la description
    if (empty(trim($_POST['description']))) {
        $errors[] = "La description est requise.";
    } else {
        $description = trim($_POST['description']);
    }

    // Traitement de l'image (facultative)
    $imagePath = "";
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        // Autoriser uniquement certains formats d'images
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            // Pour éviter les collisions, on ajoute un timestamp au nom du fichier
            $fileName = basename($_FILES['image']['name']);
            $targetPath = $uploadDir . time() . '_' . $fileName;
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                $errors[] = "Erreur lors du téléchargement de l'image.";
            } else {
                $imagePath = $targetPath;
            }
    
    }

    // Affichage des erreurs si présentes
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
        exit;
    }

    // Insertion dans la base SQLite en utilisant la classe Pattern
    try {
        $pattern = new Pattern();
        $pattern->save($title, $description, $type, $imagePath, $difficulty);
        header("Location: ../../crochet.php?status=success");
        exit();
    } catch (Exception $e) {
        header("Location: ../../crochet.php?status=error");
        exit();
    }
} else {
    echo "<p>Méthode non autorisée.</p>";
}
?>

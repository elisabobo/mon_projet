<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once 'Pattern.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    
    if (empty($_POST['type']) || !in_array($_POST['type'], ['crochet', 'tricot'])) {
        $errors[] = "Type de patron invalide.";
    } else {
        $type = $_POST['type'];
    }


    if (empty(trim($_POST['title']))) {
        $errors[] = "Le titre est requis.";
    } else {
        $title = trim($_POST['title']);
    }

    if (empty($_POST['difficulte']) || !in_array($_POST['difficulte'], ['debutant', 'intermediaire', 'avance'])) {
        $errors[] = "Niveau de difficulté invalide.";
    } else {
        $difficulty = $_POST['difficulte'];
    }

    if (empty(trim($_POST['description']))) {
        $errors[] = "La description est requise.";
    } else {
        $description = trim($_POST['description']);
    }

    $imagePath = "";
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $fileName = basename($_FILES['image']['name']);
            $targetPath = $uploadDir . time() . '_' . $fileName;
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                $errors[] = "Erreur lors du téléchargement de l'image.";
            } else {
                $imagePath = $targetPath;
            }
    
    }
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
        exit;
    }
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

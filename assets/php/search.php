<?php
require_once 'Pattern.php';

$searchTerm = $_GET['search'] ?? '';

if (!empty($searchTerm)) {

    $pattern = new Pattern(); 

    $stmt = $pattern->getDb()->prepare("SELECT * FROM patterns WHERE title LIKE :searchTerm");
    $stmt->bindValue(':searchTerm', $searchTerm . '%');
    $stmt->execute();


    $patterns = $stmt->fetchAll(PDO::FETCH_ASSOC);
    

    echo json_encode($patterns);
} else {
    echo json_encode([]);
}
?>
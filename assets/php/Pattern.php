<?php
require_once 'Database.php';

class Pattern extends Database
{
    public function __construct() {
        parent::__construct();
        
        $this->db->exec('CREATE TABLE IF NOT EXISTS patterns (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            type VARCHAR(100) NOT NULL,
            title VARCHAR(250) NOT NULL,
            pic VARCHAR(100) NOT NULL,
            text TEXT NOT NULL,
            difficulty VARCHAR(50) NOT NULL
        )');
    }

    public function save(string $title, string $description, string $type, string $pic, string $difficulty): void {
        $statement = $this->db->prepare("INSERT INTO patterns (title, type, pic, text, difficulty) VALUES (:title, :type, :pic, :description, :difficulty)");
        $statement->bindValue(':title', $title);
        $statement->bindValue(':type', $type);
        $statement->bindValue(':pic', $pic);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':difficulty', $difficulty);
        $statement->execute();
    }

    public function getAll() {
        return $this->db->query('SELECT * FROM patterns')->fetchAll();
    }

    public function get(string $id) {
        $stmt = $this->db->prepare('SELECT * FROM patterns WHERE id = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM patterns WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }


    public static function handleDeletion() {
        if (isset($_GET['delete_id'])) {
            $id = intval($_GET['delete_id']);
            $patternInstance = new self();
            $patternInstance->delete($id);
            header('Location: ../../crochet.php'); // Ajustez le chemin si nécessaire
            exit();
        }
    }
}


Pattern::handleDeletion();
?>

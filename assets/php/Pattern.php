<?php
require_once 'Database.php';

class Pattern extends Database
{
    private string $path;
    public function __construct() {
        parent::__construct();
        
        $this->path = $_SERVER['DOCUMENT_ROOT'] . '/assets/pics/pattern_img';

        $this->db->exec('CREATE TABLE IF NOT EXISTS patterns (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            type VARCHAR(100) NOT NULL,
            title VARCHAR(250) NOT NULL,
            pic VARCHAR(100) NOT NULL,
            text TEXT NOT NULL,
            difficulty VARCHAR(50) NOT NULL
        )');
    }
    public function getPath(): string
    {
        return $this->path;
    }
    public function saveImg(): string {
        $time = time();
        $type = pathinfo($_FILES['pic']['name'], PATHINFO_EXTENSION);
        $name = "{$time}.{$type}";

        move_uploaded_file($_FILES['pic']['tmp_name'], "{$this->path}/{$name}");

        return $name;
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
            header('Location: ../../crochet.php'); 
            exit();
        }
    }
}


Pattern::handleDeletion();

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
    public function getDb() {
        return $this->db;
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
    public function getByType($type) {
        $stmt = $this->db->prepare('SELECT * FROM patterns WHERE type = :type');
        $stmt->bindValue(':type', $type);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function get(string $id): mixed {
        $stmt = $this->db->prepare('SELECT * FROM patterns WHERE id = :id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function delete($id): mixed {
        $stmt = $this->db->prepare("SELECT * FROM patterns WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $pattern = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($pattern) {
            $stmt = $this->db->prepare("DELETE FROM patterns WHERE id = :id");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
        }
    
        return $pattern;
    }


    public static function handleDeletion() {
        if (isset($_GET['delete_id'])) {
            $id = intval($_GET['delete_id']);
            $patternInstance = new self();
    
            $deletedPattern = $patternInstance->delete($id);
    
            if ($deletedPattern && isset($deletedPattern['type'])) {
                $type = $deletedPattern['type'];
    
                if ($type === 'crochet') {
                    header('Location: ../../crochet.php?status=deleted');
                } else {
                    header('Location: ../../tricot.php?status=deleted');
                }
            } else {
                // Si le pattern n'a pas été trouvé, redirection par défaut
                header('Location: ../../index.php?status=not_found');
            }
    
            exit();
        }
    }
}


Pattern::handleDeletion();

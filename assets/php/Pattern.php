<?php

require_once 'Database.php';

class Pattern extends Database
{
    public function __construct() {
        parent::__construct();
        
        $this->db->exec('CREATE TABLE IF NOT EXISTS patterns (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            type VARCHAR NOT NULL,
            title VARCHAR NOT NULL,
            pic VARCHAR NOT NULL,
            text TEXT NOT NULL,
            difficulty VARCHAR NOT NULL
        )');
    }


public function save(string $title, string $description): void{
    $statement = $this->db->prepare("INSERT INTO patterns (title, type, pic, text, difficulty) VALUES (:title, :type, :pic, :description, :difficulty)");
    $statement->bindValue(':title', $title);
    $statement->bindValue(':type', $type);
    $statement->bindValue(':pic', $pic);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':difficulty', $difficulty);
    $statement->execute();

}
}
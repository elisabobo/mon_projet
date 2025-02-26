<?php

require_once 'Database.php';

class Pattern extends Database
{
    public function __construct() {
        parent::__construct();
        
        $this->db->exec('CREATE TABLE IF NOT EXISTS patterns (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title VARCHAR NOT NULL,
            pic VARCHAR NOT NULL,
            text TEXT NOT NULL
        )');
    }


public function save(string $title, string $description): void{

    $statement = $this->db->prepare("INSERT INTO patterns (title, pic, text) VALUES (:title, 'photo.jpeg', :description)");
    $statement->bindValue(':title', $title);
    $statement->bindValue(':description', $description);
    $statement->execute();



}
}
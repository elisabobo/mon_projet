<?php

require_once 'Database.php';

class Security extends Database{
    public function __construct()
    {
        parent::__construct();
        $this->db->exec('CREATE TABLE IF NOT EXISTS user(
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            email VARCHAR(255) NOT NULL UNIQUE,
            passphrase VARCHAR(255) NOT NULL

        
        )');
    }
    public function signIn(string $email, string $password){
        $statement= $this->db->prepare('INSERT INTO user ('email','passphrase'), VALUES ');
        $statement->bindValue('email', $email, PDO::PARAM_STR);
        $statement->bindValue('password', $password, PDO::PARAM_STR);
        $statement->execute();

    }
    public function login($email, $password){
        $statement=$this->db->prepare('SELECT passphrase FROM user WHERE email=:email');
        $statement->bindValue('email', $email, PDO::PARAM_STR);
        $statement->execute();

    }
}


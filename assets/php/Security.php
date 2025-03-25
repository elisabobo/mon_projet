<?php
require_once 'Database.php';

class Security extends Database
{
    public function __construct()
    {
        parent::__construct();

        $this->db->exec('CREATE TABLE IF NOT EXISTS user (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            email VARCHAR(255) NOT NULL UNIQUE,
            passphrase VARCHAR(255) NOT NULL
        )');
    }

    public function signIn(string $email, string $passphrase): void
    {
        $statement = $this->db->prepare("INSERT INTO user (email, passphrase) VALUES (:email, :passphrase)");
        $statement->bindValue(':email', $email);
        $statement->bindValue(':passphrase', $passphrase);
        $statement->execute();
    }

    public function login(string $email, string $passphrase): bool
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $statement = $this->db->prepare('SELECT id, passphrase FROM user WHERE email = :email');
        $statement->bindValue(':email', $email);
        $statement->execute();
        $data = $statement->fetch();

        if (!$data) return false;

        if (password_verify($passphrase, $data['passphrase'])) {
            $_SESSION['id'] = $data['id'];
            return true;
        }

        return false;
    }
}

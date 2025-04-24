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

    public function verifyPassword($email, $passphrase) {
        
        $user = $this->getUserByEmail($email); 
        if ($user) {
            return password_verify($passphrase, $user['passphrase']);  // Utilisez 'passphrase' ici
        }
        return false; 
    }
    public function getUserByEmail(string $email)
    {
        $stmt = $this->db->prepare('SELECT * FROM user WHERE email = :email');
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getAllUsers()
    {
        $stmt = $this->db->query('SELECT * FROM user');
        return $stmt->fetchAll();  // Retourner tous les utilisateurs
    }


    public function signIn(string $email, string $passphrase)
    {
        $hashedPassphrase = password_hash($passphrase, PASSWORD_DEFAULT);
        $statement = $this->db->prepare("INSERT INTO user (email, passphrase) VALUES (:email, :passphrase)");

        $statement->bindValue(':email', $email);
        $statement->bindValue(':passphrase', $hashedPassphrase);

        $statement->execute();
    }


    public function login(string $email, string $passphrase): bool
    {
        $statement = $this->db->prepare('SELECT id, passphrase FROM user WHERE email=:email');
        $statement->bindValue(':email', $email);
        $statement->execute();
        $data = $statement->fetch();

        if (!$data) return false;

        $_SESSION['id'] = $data['id'];

        return password_verify($passphrase, $data['passphrase']);
    }

}

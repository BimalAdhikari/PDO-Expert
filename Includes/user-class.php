<?php

include "db.php";

class User {
    private $pdo;

    public function __construct() {
        // Assuming db.php returns a PDO instance in $pdo
        global $pdo;
        $this->pdo = $pdo;
    }

    public function getUserById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function register($name, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        if (!$stmt->execute([$name, $email, $hashedPassword])) {
            throw new Exception("Registratie mislukt!");
        }
    }
}
?>
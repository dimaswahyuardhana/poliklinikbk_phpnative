<?php

class User {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function registerUser($nama_lengkap, $email, $username, $password, $role) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        try {
            $stmt = $this->conn->prepare("INSERT INTO users (nama_lengkap, email, username, password, role) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$nama_lengkap, $email, $username, $hashedPassword, $role]);
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function getUserByUsername($username) {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }
}
?>

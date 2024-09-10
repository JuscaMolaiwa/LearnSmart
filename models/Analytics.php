<?php
require_once __DIR__ . '/../config/database.php';

class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function classifyUser($userId, $classificationType) {
        $stmt = $this->pdo->prepare('UPDATE users SET classification_type = ? WHERE id = ?');
        return $stmt->execute([$classificationType, $userId]);
    }

    public function getUserById($userId) {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$userId]);
        return $stmt->fetch();
    }
}
?>

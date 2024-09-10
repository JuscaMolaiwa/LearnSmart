<?php
require_once __DIR__ . '/../config/database.php';

class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function classifyUser($userId, $classificationType) {
        try {
            $stmt = $this->pdo->prepare('UPDATE users SET classification_type = :classificationType WHERE id = :userId');
            $stmt->execute(['classificationType' => $classificationType, 'userId' => $userId]);
            return true;
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return false;
        }
    }

    public function getUserById($userId) {
        try {
            $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id = :userId');
            $stmt->execute(['userId' => $userId]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return null;
        }
    }
}
?>

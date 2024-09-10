<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../config/database.php';

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['user_id']) || !isset($input['interaction_data'])) {
    echo json_encode(['error' => 'Invalid input']);
    exit;
}

$userId = $input['user_id'];
$interactionData = $input['interaction_data'];

// Example classification logic
$classificationType = 'visual'; // Replace with actual classification logic

$user = new User($pdo);
if ($user->classifyUser($userId, $classificationType)) {
    echo json_encode(['message' => 'User classified successfully', 'classification_type' => $classificationType]);
} else {
    echo json_encode(['error' => 'Failed to classify user']);
}
?>

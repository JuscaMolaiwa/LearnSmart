<?php
require_once __DIR__ . '/../models/Content.php';
require_once __DIR__ . '/../config/database.php';

header('Content-Type: application/json');

$contentModel = new Content($pdo);

$userId = $_GET['user_id'] ?? null;
$classificationType = $_GET['classification_type'] ?? null;

if ($userId && $classificationType) {
    // Retrieve content based on classification type and enhance with personalized filtering
    $contentList = $contentModel->getContentByType($classificationType);
    
    // Example logic: Sort content by user engagement level or popularity
    usort($contentList, function($a, $b) {
        return $b['popularity'] - $a['popularity']; // Replace with actual engagement/popularity data
    });

    echo json_encode($contentList);
} else {
    echo json_encode(['error' => 'Missing parameters']);
}
?>

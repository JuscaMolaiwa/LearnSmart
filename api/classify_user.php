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

// New classification logic: Use scoring based on interaction data
function classifyUserBasedOnInteraction($interactionData) {
    $scores = [
        'visual' => 0,
        'auditory' => 0,
        'reading' => 0,
        'kinesthetic' => 0,
    ];

    foreach ($interactionData as $interaction) {
        switch ($interaction['type']) {
            case 'video':
                $scores['visual'] += 2;
                $scores['auditory'] += 1;
                break;
            case 'text':
                $scores['reading'] += 2;
                break;
            case 'quiz':
                $scores['kinesthetic'] += 2;
                break;
            default:
                break;
        }
    }

    arsort($scores);
    return key($scores); // Return the learning style with the highest score
}

$classificationType = classifyUserBasedOnInteraction($interactionData);

$user = new User($pdo);
if ($user->classifyUser($userId, $classificationType)) {
    echo json_encode(['message' => 'User classified successfully', 'classification_type' => $classificationType]);
} else {
    echo json_encode(['error' => 'Failed to classify user']);
}
?>

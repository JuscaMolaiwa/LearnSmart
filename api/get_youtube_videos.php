<?php
require_once __DIR__ . '/../vendor/autoload.php';

header('Content-Type: application/json');

$client = new Google\Client();
$client->setApplicationName('LearnSmart E-learning');
$client->setDeveloperKey('YOUR_YOUTUBE_API_KEY'); // Replace with your API Key

$youtube = new Google\Service\YouTube($client);

$searchTerms = isset($_GET['search_terms']) ? $_GET['search_terms'] : 'education';

$queryParams = [
    'q' => $searchTerms,
    'maxResults' => 5,
];

$response = $youtube->search->listSearch('snippet', $queryParams);

echo json_encode($response);
?>

<?php
// Enable error reporting for debugging purposes (remove in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Determine the requested path
$request = $_SERVER['REQUEST_URI'];
$baseDir = dirname(__FILE__) . '/public'; // Define the base directory for public files

// Simple router for directing requests
switch ($request) {
    case '/':
    case '/index.html':
        require $baseDir . '/index.html';
        break;
    
    case '/dashboard.html':
        require $baseDir . '/dashboard.html';
        break;
    
    case '/admin.html':
        require $baseDir . '/admin.html';
        break;

    case '/api/classify_user':
        require __DIR__ . '/api/classify_user.php';
        break;

    case '/api/get_content':
        require __DIR__ . '/api/get_content.php';
        break;

    case '/api/get_youtube_videos':
        require __DIR__ . '/api/get_youtube_videos.php';
        break;

    case '/api/update_progress':
        require __DIR__ . '/api/update_progress.php';
        break;

    case '/api/analyze_usage':
        require __DIR__ . '/api/analyze_usage.php';
        break;

    default:
        // Send a 404 response for unknown requests
        http_response_code(404);
        echo "404 - Not Found";
        break;
}
?>

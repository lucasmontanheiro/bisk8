<?php

$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Load dynamic routes from a separate file
$pageRoutes = include 'routes.php';

// Check if route exists
if (array_key_exists($requestPath, $pageRoutes)) {
    $pageConfig = $pageRoutes[$requestPath];

    // Extract dynamic styles and content
    $template = $pageConfig['template'] ?? 'template_home'; // Default to template1
    $iframeSrc = htmlspecialchars($pageConfig['iframe']);
    $backgroundColor = htmlspecialchars($pageConfig['background_color']);
    $color = htmlspecialchars($pageConfig['color']);
    $aColor = htmlspecialchars($pageConfig['a_color']);
    $aBackgroundColor = htmlspecialchars($pageConfig['a_background_color']);
    $title = htmlspecialchars($pageConfig['title'] ?? 'Default Title');

    // Include the selected template
    include "{$template}.php";
} else {
    // Route not found
    http_response_code(404);
    echo "<h1>404 - Page Not Found</h1>";
}

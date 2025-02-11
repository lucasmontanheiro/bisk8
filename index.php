<?php

$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Ensure routes.php exists before including
if (!file_exists('routes.php')) {
    http_response_code(500);
    die("<h1>500 - Server Error</h1><p>Configuration file is missing.</p>");
}

$pageRoutes = include 'routes.php';

// Check if route exists
if (array_key_exists($requestPath, $pageRoutes)) {
    $pageConfig = $pageRoutes[$requestPath];

    // Define allowed templates
    $allowedTemplates = ['template_home', 'template_about', 'template_contact'];

    // Extract dynamic styles and content with fallbacks
    $template = in_array($pageConfig['template'] ?? 'template_home', $allowedTemplates) 
                ? $pageConfig['template'] 
                : 'template_home';

    $iframeSrc = htmlspecialchars($pageConfig['iframe'] ?? '');
    $backgroundColor = htmlspecialchars($pageConfig['background_color'] ?? '#fff');
    $color = htmlspecialchars($pageConfig['color'] ?? '#000');
    $aColor = htmlspecialchars($pageConfig['a_color'] ?? '#000');
    $aBackgroundColor = htmlspecialchars($pageConfig['a_background_color'] ?? '#fff');
    $title = htmlspecialchars($pageConfig['title'] ?? 'bisk8.de');

    // Include the selected template
    include "{$template}.php";
} else {
    // Improved 404 handling
    http_response_code(404);
    include '404.php'; // Ensure this file exists for a styled 404 page
    exit;
}
?>

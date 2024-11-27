<?php

$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Static file routes
$routes = [
    '/' => 'dir/homepage.php',
    '/bisk8' => 'dir/bisk8.php',
    '/corinthians' => 'dir/corinthians.php',
    '/geco' => 'dir/geco.php',
    '/franguinho' => 'dir/franguinho.php',
];

// Define routes with additional configurations
$pageRoutes = [
    "/" => [
        "title" => "BISK8 NOVA PAGINA",
        "iframe" => "https://docs.google.com/document/d/e/2PACX-1vQsd1IPhwS4hNttet31WZUlzMY_J4QTEF5Flwb-t4j5X_fvgs62657ha9MAmgTxfkPS_bZwscz8NbF5/pub?embedded=true",
        "background_color" => "#ebe0cc",
        "color" => "#252527",
        "a_color" => "#0690d4",
        "a_background_color" => "#f9da1d",
    ],
    "/bisk8" => [
        "title" => "Welcome to BISK8",
        "iframe" => "https://example.com/bisk8",
        "background_color" => "#ffffff",
        "color" => "#000000",
        "a_color" => "#ff0000",
        "a_background_color" => "#cccccc",
    ],
];

// Check if route exists in static or dynamic routes
if (array_key_exists($requestPath, $pageRoutes)) {
    // Dynamic route rendering
    $pageConfig = $pageRoutes[$requestPath];

    // Extract dynamic styles and content
    $title = htmlspecialchars($pageConfig['title']);
    $iframeSrc = htmlspecialchars($pageConfig['iframe']);
    $backgroundColor = htmlspecialchars($pageConfig['background_color']);
    $color = htmlspecialchars($pageConfig['color']);
    $aColor = htmlspecialchars($pageConfig['a_color']);
    $aBackgroundColor = htmlspecialchars($pageConfig['a_background_color']);

    // Render the page dynamically
    echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$title}</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            background-color: {$backgroundColor};
            color: {$color};
        }
        iframe {
            border: none;
            width: 100%;
            height: 100%;
        }
        a {
            color: {$aColor};
            background-color: {$aBackgroundColor};
            text-decoration: none;
            padding: 5px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>{$title}</h1>
    <iframe src="{$iframeSrc}"></iframe>
</body>
</html>
HTML;
} else {
    // Route not found
    error_log("404 Not Found: " . $requestPath);
    http_response_code(404);
    exit('Not Found');
}


?>


<!--

$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$routes = [
    '/' => 'dir/homepage.php',
    '/bisk8' => 'dir/bisk8.php',
    '/corinthians' => 'dir/corinthians.php',
    '/geco' => 'dir/geco.php',
    '/franguinho' => 'dir/franguinho.php',
];

// Define routes with corresponding configurations
$pageRoutes = [
    "/" => [
        "title" => "BISK8 NOVA PAGINA",
        "iframe" => "https://example.com/corinthians",
        "background_color" => "#ebe0cc",
        "color" => "#252527",
        "a_color" => "#0690d4",
        "a_background_color" => "#f9da1d",
    ],
];

if (array_key_exists($requestPath, $routes)) {
    require $routes[$requestPath];
} else {
    error_log("404 Not Found: " . $requestPath);
    http_response_code(404);
    exit('Not Found');
}

-->
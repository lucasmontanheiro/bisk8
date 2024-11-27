<?php
// Define routes with corresponding configurations
$pageRoutes = [
    "/" => [
        "title" => "BISK8 NOVA PAGINA",
        "iframe" => "https://example.com/corinthians",
        "background_color" => "#ebe0cc",
        "color" => "#252527",
        "a_color" => "#0690d4",
        "a_background_color" => "#f9da1d",
    ]
];

// Parse current request path
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Find the matching route or default to 404
if (array_key_exists($requestPath, $pageRoutes)) {
    $pageData = $pageRoutes[$requestPath];
    $pageTitle = $pageData['title'];
    $iframeSrc = $pageData['iframe'];
    include "../dir/main-template.php";
} else {
    http_response_code(404);
    include "../templates/404.php"; // Optional 404 page
    exit;
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

if (array_key_exists($requestPath, $routes)) {
    require $routes[$requestPath];
} else {
    error_log("404 Not Found: " . $requestPath);
    http_response_code(404);
    exit('Not Found');
}

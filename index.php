<?php

$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Load dynamic routes from a separate file
$pageRoutes = include 'routes.php';

// Check if route exists in static or dynamic routes
if (array_key_exists($requestPath, $pageRoutes)) {
    // Dynamic route rendering
    $pageConfig = $pageRoutes[$requestPath];

    // Extract dynamic styles and content
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

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GQHJY7DQ9M"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-GQHJY7DQ9M');
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$title}</title>
    <link rel="stylesheet" href="/static/css.css">

    <style>
        html, body {
            margin: 5px;
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
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="header"><a href="https://bisk8.de">bisk8.de</a> 🍪 <span class="blinking"><a href="https://macondolabs.substack.com/">assinar newsletter</a></span></div>
    
    <iframe src="https://docs.google.com/document/d/e/{$iframeSrc}/pub?embedded=true"></iframe>

laboratoriosmacondo🍪gmail.com 

<?php
// Include the routes file and retrieve the routes array
$routes = include 'routes.php';

// Check if the file returns an array
if (!is_array($routes)) {
    die('Invalid routes file.');
}

// Display all routes with their info
echo "<h1>Routes Information</h1>";
echo "<table border='1' cellpadding='10' cellspacing='0' style='border-collapse: collapse;'>";
echo "<thead>
        <tr>
            <th>Path</th>
            <th>Iframe</th>
            <th>Background Color</th>
            <th>Text Color</th>
            <th>Link Color</th>
            <th>Link Background Color</th>
        </tr>
      </thead>";
echo "<tbody>";

foreach ($routes as $path => $info) {
    // Safely access all attributes, ensuring defaults if some keys are missing
    $iframe = htmlspecialchars($info['iframe'] ?? 'N/A');
    $backgroundColor = htmlspecialchars($info['background_color'] ?? 'N/A');
    $color = htmlspecialchars($info['color'] ?? 'N/A');
    $aColor = htmlspecialchars($info['a_color'] ?? 'N/A');
    $aBackgroundColor = htmlspecialchars($info['a_background_color'] ?? 'N/A');
    
    // Display the route info as a table row
    echo "<tr>
            <td>" . htmlspecialchars($path) . "</td>
            <td><a href='https://docs.google.com/document/d/e/$iframe/pub' target='_blank'>View Document</a></td>
            <td style='background-color: $backgroundColor;'>$backgroundColor</td>
            <td style='color: $color;'>$color</td>
            <td style='color: $aColor;'>$aColor</td>
            <td style='background-color: $aBackgroundColor;'>$aBackgroundColor</td>
          </tr>";
}

echo "</tbody>";
echo "</table>";
?>

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
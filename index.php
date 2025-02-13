<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>bisk8 zine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="static/css.css">
</head>
<body>

<div class="container-fluid">
    <header class="header">
        <a href="/">bisk8.de</a> * <span class="blinking"><a href="https://macondolabs.substack.com/">assinar newsletter</a></span> * <a href="/archive">arquivo</a>
    </header>
    <main class="main-content">
        <div class="content-box">    
<?php 

switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
    case '/':
        require 'template_home.php';
        break;
    case '/archive':
        require 'archive.php';
        break;
    default:
        http_response_code(404);
        exit('Not Found');
}

?>


</div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
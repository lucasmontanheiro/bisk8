<?php 

switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
    case '/':
        require 'homepage.php';
        break;
    case '/bisk8':
        require 'bisk8.php';
        break;
    case '/corinthians':
        require 'corinthians.php';
        break;
    default:
        http_response_code(404);
        exit('Not Found');
}

?>
<?php
echo <<<HTML
<!DOCTYPE html>
<html>
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
    <title>Bisk8 Zine</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            background-color: #9a9865;
        }
        iframe {
            border: none;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <iframe src="https://docs.google.com/document/d/e/2PACX-1vRr5Bq510tPsxJ8yVnURqC7iWhrhEU7oR4l9PKWH_1xwNrdjscGFVWkI0pUNLWT1EIwgMw5nUQuAJQx/pub?embedded=true"></iframe>
</body>
</html>
HTML;
?>

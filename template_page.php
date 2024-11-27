<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="/static/css.css">
    <style>
        html, body {
            margin: 0;
            padding: 20px;
            height: 100%;
            width: 100%;
            background-color: <?php echo $backgroundColor; ?>;
            color: <?php echo $color; ?>;
        }
        iframe {
            border: none;
            width: 90%;
            height: 80%;
        }
        a {
            color: <?php echo $aColor; ?>;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Welcome to Template PAGES</h1>
    <iframe src="https://docs.google.com/document/d/e/<?php echo $iframeSrc; ?>/pub?embedded=true"></iframe>
</body>
</html>

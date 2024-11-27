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
            padding: 0;
            height: 100%;
            width: 100%;
            background-color: <?php echo $backgroundColor; ?>;
            color: <?php echo $color; ?>;
        }
        iframe {
            border: none;
            width: 100%;
            height: 100%;
        }
        a {
            color: <?php echo $aColor; ?>;
            background-color: <?php echo $aBackgroundColor; ?>;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Welcome to Template HOME</h1>
    <iframe src="https://docs.google.com/document/d/e/<?php echo $iframeSrc; ?>/pub?embedded=true"></iframe>
</body>
</html>

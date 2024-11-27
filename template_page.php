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

<div class="header"><a href="https://bisk8.de">bisk8.de</a> 🍪 <span class="blinking"><a href="https://macondolabs.substack.com/">assinar newsletter</a></span></div>

    <iframe src="https://docs.google.com/document/d/e/<?php echo $iframeSrc; ?>/pub?embedded=true"></iframe>

laboratoriosmacondo🍪gmail.com 

</body>
</html>

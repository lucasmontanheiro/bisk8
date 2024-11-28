<?php
// Set the URL of the JSON feed
$jsonFeedUrl = "https://rss.app/feeds/v1.1/_747p4vDuyrpWlCOE.json";

try {
    // Fetch the JSON content
    $jsonContent = file_get_contents($jsonFeedUrl);

    // Check if the content was fetched successfully
    if ($jsonContent === false) {
        throw new Exception("Unable to fetch the JSON feed.");
    }

    // Decode the JSON content into a PHP array
    $feed = json_decode($jsonContent, true);

    // Check if decoding was successful
    if ($feed === null) {
        throw new Exception("Error decoding JSON feed.");
    }

    // Display the JSON feed content
    echo "<h1>{$feed['title']}</h1>";
    echo "<p><strong>Description:</strong> {$feed['description']}</p>";
    echo "<p><strong>Home Page:</strong> <a href='{$feed['home_page_url']}'>{$feed['home_page_url']}</a></p>";
    echo "<p><strong>Feed URL:</strong> <a href='{$feed['feed_url']}'>{$feed['feed_url']}</a></p>";
    echo "<ul>";

    // Loop through each item in the feed
    foreach ($feed['items'] as $item) {
        echo "<li>";
        echo "<strong>Title:</strong> <a href='{$item['url']}'>{$item['title']}</a><br>";
        echo "<strong>Published:</strong> " . date('Y-m-d H:i:s', strtotime($item['date_published'])) . "<br>";
        echo "<strong>Content:</strong> {$item['content_text']}<br>";
        if (isset($item['image'])) {
            echo "<img src='{$item['image']}' alt='Image for {$item['title']}' style='max-width: 100%; height: auto;'><br>";
        }
        if (isset($item['authors'])) {
            echo "<strong>Author:</strong> " . implode(', ', array_column($item['authors'], 'name')) . "<br>";
        }
        echo "</li>";
    }

    echo "</ul>";
} catch (Exception $e) {
    // Handle exceptions
    echo "<p>Error: " . $e->getMessage() . "</p>";
}
?>

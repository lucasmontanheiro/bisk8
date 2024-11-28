<?php
// List of Instagram account JSON feed URLs
$instagramFeeds = [
    "https://rss.app/feeds/v1.1/_747p4vDuyrpWlCOE.json"
    //"https://rss.app/feeds/v1.1/_exampleFeed2.json",
    //"https://rss.app/feeds/v1.1/_exampleFeed3.json"
];

try {
    $posts = [];

    // Fetch and combine all feeds
    foreach ($instagramFeeds as $feedUrl) {
        $jsonContent = file_get_contents($feedUrl);

        // Check if content was fetched successfully
        if ($jsonContent === false) {
            throw new Exception("Unable to fetch feed from: $feedUrl");
        }

        // Decode JSON content
        $feed = json_decode($jsonContent, true);

        // Check for valid decoding and extract items
        if (isset($feed['items'])) {
            foreach ($feed['items'] as $item) {
                $posts[] = [
                    'title' => $item['title'],
                    'url' => $item['url'],
                    'date_published' => $item['date_published']
                ];
            }
        }
    }

    // Sort posts by date_published (descending)
    usort($posts, function ($a, $b) {
        return strtotime($b['date_published']) - strtotime($a['date_published']);
    });

    // Display the timeline
    echo "<h1>Instagram Timeline</h1>";
    echo "<ul>";
    foreach ($posts as $post) {
        echo "<li>";
        echo "<strong>Title:</strong> <a href='{$post['url']}'>{$post['title']}</a><br>";
        echo "<strong>Published:</strong> " . date('Y-m-d H:i:s', strtotime($post['date_published'])) . "<br>";
        echo "</li>";
    }
    echo "</ul>";
} catch (Exception $e) {
    // Handle exceptions
    echo "<p>Error: " . $e->getMessage() . "</p>";
}
?>

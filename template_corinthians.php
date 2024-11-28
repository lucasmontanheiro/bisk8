<?php
// List of Instagram profiles to scrape
$instagramProfiles = [
    "https://www.instagram.com/instagram/",
    "https://www.instagram.com/nasa/",
    "https://www.instagram.com/natgeo/"
];

try {
    $posts = [];

    foreach ($instagramProfiles as $profileUrl) {
        // Fetch the profile page
        $htmlContent = file_get_contents($profileUrl);

        // Check if the content was fetched successfully
        if ($htmlContent === false) {
            throw new Exception("Unable to fetch profile page: $profileUrl");
        }

        // Extract the shared data from the page
        preg_match('/<script type="application\/ld\+json">(.*?)<\/script>/', $htmlContent, $matches);

        if (!isset($matches[1])) {
            throw new Exception("Unable to extract JSON data from: $profileUrl");
        }

        // Decode the extracted JSON
        $profileData = json_decode($matches[1], true);

        // Check if decoding was successful and extract posts
        if ($profileData && isset($profileData['mainEntityofPage']['@type']) && $profileData['mainEntityofPage']['@type'] === 'ProfilePage') {
            $posts[] = [
                'title' => $profileData['name'] . " - Instagram Profile",
                'url' => $profileUrl,
                'description' => $profileData['description'] ?? 'No description available.',
            ];
        }
    }

    // Display the timeline
    echo "<h1>Instagram Profile Timeline</h1>";
    echo "<ul>";
    foreach ($posts as $post) {
        echo "<li>";
        echo "<strong>Title:</strong> <a href='{$post['url']}'>{$post['title']}</a><br>";
        echo "<strong>Description:</strong> {$post['description']}<br>";
        echo "</li>";
    }
    echo "</ul>";
} catch (Exception $e) {
    // Handle exceptions
    echo "<p>Error: " . $e->getMessage() . "</p>";
}
?>

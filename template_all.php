<?php
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
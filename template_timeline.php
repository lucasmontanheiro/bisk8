<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Movements Timeline</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .timeline {
            width: 90%;
            margin: 20px auto;
        }
        .timeline-box {
            background: #fff;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .timeline-box h2 {
            margin: 0 0 10px;
            color: #333;
        }
        .timeline-box ul {
            list-style: none;
            padding: 0;
            margin: 10px 0;
        }
        .timeline-box ul li {
            padding: 5px 0;
            border-bottom: 1px dotted #ccc;
        }
        .timeline-box ul li:last-child {
            border: none;
        }
        .details {
            margin-top: 20px;
            border-top: 1px solid #eee;
            padding-top: 10px;
        }
        .details h3 {
            margin-bottom: 10px;
            color: #555;
        }
        .details p {
            margin: 5px 0;
            color: #666;
        }
        .expand-btn {
            display: inline-block;
            margin-top: 10px;
            background: #007BFF;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .expand-btn:hover {
            background: #0056b3;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
    <header style="background: #007BFF; color: white; padding: 20px; text-align: center;">
        <h1>Art Movements Timeline</h1>
    </header>
    <div class="timeline">
        <!-- Example Timeline Box -->
        <div class="timeline-box">
            <h2>Impressionism (1860s-1880s)</h2>
            <ul>
                <li><strong>Characteristics:</strong> Focus on light and color, visible brushstrokes, outdoor scenes.</li>
                <li><strong>Innovation:</strong> Use of natural lighting and plein air painting techniques.</li>
            </ul>
            <a href="#" class="expand-btn" onclick="toggleDetails(event)">View More Details</a>
            <div class="details hidden">
                <h3>Political Context:</h3>
                <p>Reaction against traditional academic painting styles.</p>
                <h3>Locations:</h3>
                <p>Primarily France, especially Paris.</p>
                <h3>Techniques:</h3>
                <p>Quick, small brushstrokes and use of natural light.</p>
                <h3>Main Artists:</h3>
                <p>Claude Monet, Edgar Degas, Pierre-Auguste Renoir.</p>
            </div>
        </div>

        <!-- Template for Additional Movements -->
        <!-- Add more boxes for other art movements -->
        <div class="timeline-box">
            <h2>Cubism (1907-1920s)</h2>
            <ul>
                <li><strong>Characteristics:</strong> Fragmented subjects, geometric shapes, and multiple perspectives.</li>
                <li><strong>Innovation:</strong> Pioneering abstraction and rejecting traditional perspective.</li>
            </ul>
            <a href="#" class="expand-btn" onclick="toggleDetails(event)">View More Details</a>
            <div class="details hidden">
                <h3>Political Context:</h3>
                <p>Emergence during a time of rapid industrial and cultural change.</p>
                <h3>Locations:</h3>
                <p>Centered in Paris, France.</p>
                <h3>Techniques:</h3>
                <p>Collage, overlapping planes, and monochromatic color schemes.</p>
                <h3>Main Artists:</h3>
                <p>Pablo Picasso, Georges Braque.</p>
            </div>
        </div>
    </div>

    <script>
        function toggleDetails(event) {
            event.preventDefault();
            const details = event.target.nextElementSibling;
            if (details.classList.contains('hidden')) {
                details.classList.remove('hidden');
                event.target.textContent = "Hide Details";
            } else {
                details.classList.add('hidden');
                event.target.textContent = "View More Details";
            }
        }
    </script>
</body>
</html>

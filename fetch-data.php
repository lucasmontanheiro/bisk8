<?php
function fetchSpreadsheetData($spreadsheetId, $range, $apiKey) {
    // Google Sheets API URL
    $url = "https://sheets.googleapis.com/v4/spreadsheets/$spreadsheetId/values/$range?key=$apiKey";

    // Fetch data using file_get_contents
    $response = file_get_contents($url);
    if ($response === FALSE) {
        die("Error fetching data from Google Sheets API.");
    }

    // Decode JSON response
    $data = json_decode($response, true);

    // Check if data is valid
    if (!isset($data['values'])) {
        die("Invalid data received from Google Sheets.");
    }

    return $data['values'];
}

// Google Sheets Config
$spreadsheetId = "1tXFNjLHGGlmgqKi50oSFUYlqZ_raTNDJPYpSMx0yzx0"; // Replace with your Google Sheet ID
$range = "Sheet1!A5:V5423"; // Adjust the range based on your spreadsheet
$apiKey = "AIzaSyDEp6eo3vt0Y-iQOC6mj8V-j1sXM4io7YU"; // Replace with your API key

// Fetch spreadsheet data
$data = fetchSpreadsheetData($spreadsheetId, $range, $apiKey);

// Pass data to the HTML
header('Content-Type: application/json');
echo json_encode($data);

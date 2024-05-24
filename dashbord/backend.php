<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the raw POST data
    $postData = file_get_contents('php://input');

    // Decode the JSON data into a PHP associative array
    $postDataArray = json_decode($postData, true);

    // Check if the 'cardTitle' key exists in the received data
    if (isset($postDataArray['cardTitle'])) {
        // Extract the card title from the received data
        $cardTitle = $postDataArray['cardTitle'];

        // Process the card title (e.g., save it to a database, perform some operation, etc.)
        // For demonstration, let's just echo the received card title
        echo "Received card title: " . $cardTitle;
    } else {
        // If the 'cardTitle' key is not present in the received data
        echo "Error: 'cardTitle' key not found in the received data";
    }
} else {
    // If the request method is not POST
    echo "Error: Only POST requests are allowed";
}
?>

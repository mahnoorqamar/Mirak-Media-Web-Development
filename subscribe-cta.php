<?php
// subscribe-cta.php

// Configure MySQL
$db_host = 'localhost';
$db_user = 'mirakmed_mahnoor';
$db_password = 'RaRiazGoharShahi@1150';
$db_database = 'mirakmed_mahnoordatabase';

// Create a connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process subscription form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["subscribe-news"];

    // Perform the SQL query
    $query = "INSERT INTO subscriptions_cta (email) VALUES ('$email')";

    if ($conn->query($query) === TRUE) {
        // Redirect to the "Thank You" HTML page after successful subscription
        header("Location: thank-you.html");
        exit(); // Ensure that no further code is executed after the header redirect
    } else {
        echo json_encode(['status' => 'error', 'message' => $conn->error]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}

// Close the connection
$conn->close();
?>

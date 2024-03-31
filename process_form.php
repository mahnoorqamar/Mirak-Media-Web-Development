<?php
// process_form.php

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

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["contact-name"];
    $email = $_POST["contact-email"];
    $subject = $_POST["subject"];
    $message = $_POST["contact-message"];

    // Perform the SQL query
    $query = "INSERT INTO contact_form_data (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($query) === TRUE) {
        // Redirect to the "Thank You" HTML page after successful form submission
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

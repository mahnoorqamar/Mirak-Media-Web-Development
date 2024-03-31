<!-- process_comment.php -->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['comment-name'];
    $email = $_POST['comment-email'];
    $message = $_POST['comment-message'];

    // Perform data validation and sanitization if needed

    // Connect to your database (replace with your actual database credentials)
    $servername = "localhost";
    $username = "mirakmed_mahnoor";
    $password = "RaRiazGoharShahi@1150";
    $dbname = "mirakmed_mahnoordatabase";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the comments table (create the table in your database)
    $sql = "INSERT INTO comments (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to thank-you.html upon successful submission
        header("Location: thank-you.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<?php
// Database connection
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "coffee"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Escape user inputs for security
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$rating = $conn->real_escape_string($_POST['rating']);
$comment = $conn->real_escape_string($_POST['comment']);

// Attempt insert query execution
$sql = "INSERT INTO reviews (name, email, rating, comment) VALUES ('$name', '$email', '$rating', '$comment')";

if ($conn->query($sql) === true) {
    echo "Review added successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . $conn->error;
}

// Close connection
$conn->close();
?>

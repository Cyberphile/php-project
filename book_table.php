<?php
$serverName = "localhost";
$username = "user";
$databaseName = "coffee";
$password = ""; // Enter your MySQL password here

// Create connection
$conn = new mysqli($serverName, $username, $password, $databaseName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $num_members = $_POST['num_members'];
    $message = $_POST['message'];

    // Prepare SQL statement
    $sql = "INSERT INTO bookings (name, email, phone, num_members, message) VALUES ('$name', '$email', '$phone', $num_members, '$message')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

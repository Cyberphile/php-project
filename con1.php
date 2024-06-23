<?php
session_start();

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Database connection
$servername = "localhost"; // Replace with your servername
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "coffee"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare a select statement
$sql = "SELECT id, username, email, phone, profile_pic FROM users WHERE id = ?";

if ($stmt = $conn->prepare($sql)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("i", $param_id);

    // Set parameters
    $param_id = $_SESSION["id"];

    // Attempt to execute the prepared statement
    if ($stmt->execute()) {
        // Store result
        $stmt->store_result();

        // Check if username exists, if yes then verify password
        if ($stmt->num_rows == 1) {
            // Bind result variables
            $stmt->bind_result($id, $username, $email, $phone, $profile_pic);
            if ($stmt->fetch()) {
                // Retrieve profile picture
                if (!empty($profile_pic)) {
                    $profile_pic = "uploads/" . $profile_pic;
                } else {
                    $profile_pic = "images/default_profile_pic.jpg";
                }
            }
        } else {
            // Redirect to login page
            header("location: login.php");
            exit;
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
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

// Attempt select query execution
$sql = "SELECT * FROM reviews ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo '<div class="review-container">'; // Start of review container
    $count = 0;
    while($row = $result->fetch_assoc()) {
        // Output HTML for each review
        if ($count % 3 == 0) {
            echo '<div class="row">'; // Start of row
        }
        echo '<div class="box">';
        echo '<h3>' . $row["name"] . '</h3>';
        echo '<h4>' . $row["rating"] . '</h4>';
        echo '<p>' . $row["comment"] . '</p>';
        echo '</div>';
        $count++;
        if ($count % 3 == 0) {
            echo '</div>'; // End of row
        }
    }
    if ($count % 3 != 0) {
        // If the last row doesn't contain three boxes, close the row
        echo '</div>'; // End of row
    }
    echo '</div>'; // End of review container
} else {
    echo '<p class="no-reviews">No reviews yet.</p>';
}

// Close connection
$conn->close();
?>

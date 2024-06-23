<?php
$serverName = "localhost";
$username = "root";
$databaseName = "coffee";
$password = "";

$conn = mysqli_connect($serverName, $username, $password, $databaseName);

 if(mysqli_connect_error()){
   echo "Cannot Connect";
}

if(isset($_POST['Email']) && isset($_POST['Password'])){
   $Email = $_POST['Email'];
   $Password = $_POST['Password'];

   $sql = "INSERT INTO `user_login`(`Email`, `Password`) VALUES ('$Email','$Password');";
   echo "$sql";
}

// Function to sanitize input
function sanitize_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

// Define variables and initialize with empty values
$username = $password = $confirm_password = $email = "";
$username_err = $password_err = $confirm_password_err = $email_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

   // Validate username
   if (empty($_POST["username"])) {
       $username_err = "Please enter a username.";
   } else {
       $username = sanitize_input($_POST["username"]);
       // Check if username already exists
       $sql = "SELECT id FROM users WHERE username = ?";
       if ($stmt = $conn->prepare($sql)) {
           $stmt->bind_param("s", $param_username);
           $param_username = $username;
           if ($stmt->execute()) {
               $stmt->store_result();
               if ($stmt->num_rows == 1) {
                   $username_err = "This username is already taken.";
               }
           } else {
               echo "Oops! Something went wrong. Please try again later.";
           }
           $stmt->close();
       }
   }

   // Validate password
   if (empty($_POST["password"])) {
       $password_err = "Please enter a password.";
   } elseif (strlen(trim($_POST["password"])) < 6) {
       $password_err = "Password must have at least 6 characters.";
   } else {
       $password = sanitize_input($_POST["password"]);
   }

   // Validate confirm password
   if (empty($_POST["confirm_password"])) {
       $confirm_password_err = "Please confirm password.";
   } else {
       $confirm_password = sanitize_input($_POST["confirm_password"]);
       if (empty($password_err) && ($password != $confirm_password)) {
           $confirm_password_err = "Password did not match.";
       }
   }

   // Validate email
   if (empty($_POST["email"])) {
       $email_err = "Please enter your email.";
   } else {
       $email = sanitize_input($_POST["email"]);
       // Check if email already exists
       $sql = "SELECT id FROM users WHERE email = ?";
       if ($stmt = $conn->prepare($sql)) {
           $stmt->bind_param("s", $param_email);
           $param_email = $email;
           if ($stmt->execute()) {
               $stmt->store_result();
               if ($stmt->num_rows == 1) {
                   $email_err = "This email is already registered.";
               }
           } else {
               echo "Oops! Something went wrong. Please try again later.";
           }
           $stmt->close();
       }
   }

   // Check input errors before inserting into database
   if (empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err)) {

       // Prepare an insert statement
       $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";

       if ($stmt = $conn->prepare($sql)) {
           // Bind variables to the prepared statement as parameters
           $stmt->bind_param("sss", $param_username, $param_password, $param_email);

           // Set parameters
           $param_username = $username;
           $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
           $param_email = $email;

           // Attempt to execute the prepared statement
           if ($stmt->execute()) {
               // Redirect to login page
               header("location: login.php");
           } else {
               echo "Something went wrong. Please try again later.";
           }

           // Close statement
           $stmt->close();
       }
   }

   // Close connection
   $conn->close();
}
?>
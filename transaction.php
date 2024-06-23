<?php
session_start();

$serverName = "localhost";
$username = "root";
$databaseName = "coffee";
$password = "";

$conn = mysqli_connect($serverName, $username, $password, $databaseName);

 if(mysqli_connect_error()){
   echo "Cannot Connect";
}

// Function to validate card details
function validateCardDetails($conn, $cardholder_name, $card_number, $exp_month, $exp_year, $cvc, $total_amount) {
    // Query to check if card details match
    $query = "SELECT * FROM card_details WHERE card_number = '$card_number' AND 
              cardholder_name = '$cardholder_name' AND exp_month = '$exp_month' AND 
              exp_year = '$exp_year' AND cvc = '$cvc'";

    // Execute the query
    $result = $conn->query($query);

    // Check if there's a match
    if ($result->num_rows > 0) {
        // Payment successful
        return true;
    } else {
        // Payment failed
        return false;
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $cardholder_name = $_POST['cardholder_name'];
    $card_number = $_POST['card_number'];
    $exp_month = $_POST['exp_month'];
    $exp_year = $_POST['exp_year'];
    $cvc = $_POST['cvc'];
    $total_amount = $_POST['total_amount'];

    // Validate card details
    $payment_successful = validateCardDetails($conn, $cardholder_name, $card_number, $exp_month, $exp_year, $cvc, $total_amount);

    // Display message based on payment result
    if ($payment_successful) {
        echo "Payment was successful!";
    } else {
        echo "Payment failed. Please check your card details and try again.";
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F5DABA;
            margin: 110px;
          
        }

        .transaction-form {
            width: 300px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px; /* Border radius */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Box shadow */
        }

        .transaction-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .transaction-form p {
            text-align: center;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            
        }

        .has-error .form-control {
            border-color: #ff0000;
        }

        .help-block {
            color: #ff0000;
        }

        .btn {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #DDBE9F;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: grey;
        }

        .btn-default {
            background-color: #ccc;
            color: #000;
        }

        .btn-default:hover {
            background-color: #b3b3b3;
        }
    </style>
</head>
<body>
<?php
    Include("login.php");
    ?>

    <div class="transaction-form">
        <h2>Enter Transaction Details</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="cardholder_name">Cardholder Name:</label>
            <input type="text" id="cardholder_name" name="cardholder_name" class="form-control" required><br><br>

            <label for="card_number">Card Number:</label>
            <input type="text" id="card_number" name="card_number" class="form-control" required><br><br>

            <label for="exp_month">Expiration Month:</label>
            <input type="text" id="exp_month" name="exp_month" class="form-control" required><br><br>

            <label for="exp_year">Expiration Year:</label>
            <input type="text" id="exp_year" name="exp_year" class="form-control" required><br><br>

            <label for="cvc">CVC:</label>
            <input type="text" id="cvc" name="cvc" class="form-control" required><br><br>


             <input type="hidden" id="total_amount" name="total_amount" value="<?php echo isset($_POST['total_amount']) ? $_POST['total_amount'] : ''; ?>" required><br><br>

            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
    
</body>
</html>

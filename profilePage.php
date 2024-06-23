<?php
// Example: Retrieve user details from the database
// Replace these with your actual database retrieval code
$userFirstName = "John";
$userLastName = "Doe";
$userCoupons = ["Coupon 1", "Coupon 2", "Coupon 3"];
$userCart = ["Item 1", "Item 2", "Item 3"];
$userAddress = "123 Main St, City, Country";
$userEmail = "john@example.com";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #be9c79;
            color: #fff; /* White text */
        }
        h1, h2 {
            color: #3d1e03; /* Dark brown heading */
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Welcome, <?php echo $userFirstName; ?></h1>
    
    <h2>Profile Information:</h2>
    <p><strong>First Name:</strong> <?php echo $userFirstName; ?></p>
    <p><strong>Last Name:</strong> <?php echo $userLastName; ?></p>
    <p><strong>Email:</strong> <?php echo $userEmail; ?></p>
    <p><strong>Address:</strong> <?php echo $userAddress; ?></p>

    <h2>Your Coupons:</h2>
    <ul>
    <?php foreach ($userCoupons as $coupon): ?>
        <li><?php echo $coupon; ?></li>
    <?php endforeach; ?>
    </ul>

    <h2>Your Cart:</h2>
    <ul>
    <?php foreach ($userCart as $item): ?>
        <li><?php echo $item; ?></li>
    <?php endforeach; ?>
    </ul>
</body>
</html>

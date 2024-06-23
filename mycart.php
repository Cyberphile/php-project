<?php
ob_start();
session_start();
Include("login.php");

// Check if the cart is empty
if (empty($_SESSION['cart'])) {
    $cart_items = array();
} else {
    $cart_items = $_SESSION['cart'];
}

// Function to calculate the total price of items in the cart
function calculateTotalPrice($cart_items) {
    $total_price = 0;
    foreach ($cart_items as $item) {
        $total_price += $item['price'];
    }
    return $total_price;
}

// Function to remove an item from the cart
function removeItemFromCart($index) {
    if (isset($_SESSION['cart'][$index])) {
        unset($_SESSION['cart'][$index]);
    }
}


// Function to take out all items from the cart
function takeOutAllItems() {
    $_SESSION['cart'] = array();
}

// Check if the delete button is clicked
if (isset($_POST['delete'])) {
    $index = $_POST['index'];
    removeItemFromCart($index);
    header("Location: {$_SERVER['PHP_SELF']}"); // Redirect to refresh the page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        /* Add your CSS styles here */
        .cart-container {
            font-family: 'Merienda One', cursive;
            max-width: 55rem;
            margin: auto;
            text-align: center;
            padding: 1rem;
            font-size: 1.6rem;
            color: #222;
            line-height: 2;
            margin-top: 80px; 
        }
        
        .cart-item {
            list-style: none;
            border-bottom: 1px solid #ccc;
            padding: 0.5rem 0;
        }
        
        .cart-item:last-child {
            border-bottom: none;
        }
        
        .cart-item button {
            background-color: #be9c79;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            cursor: pointer;
        }
        
        .cart-item button:hover {
            background-color: #be9c79;
        }
        
        .total-price {
            font-weight: bold;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <!-- Cart contents -->
    <div class="cart-container">
        <h1>My Cart</h1>
        <?php if (empty($cart_items)): ?>
            <p>No items in the cart</p>
        <?php else: ?>
            <ul>
                <?php foreach ($cart_items as $index => $cart_item): ?>
                    <li class="cart-item">
                        <?php echo $cart_item['name']; ?> - $<?php echo $cart_item['price']; ?>
                        <form method="post">
                            <input type="hidden" name="index" value="<?php echo $index; ?>">
                            <button type="submit" name="delete">Delete</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
            <!-- Pass total price as hidden input field in the form -->
            <form method="post">
                <input type="hidden" name="total_amount" value="<?php echo calculateTotalPrice($cart_items); ?>">
                <button type="submit" name="checkout">Check Out All</button>
            </form>
            <p class="total-price">Total Price: $<?php echo calculateTotalPrice($cart_items); ?></p>
        <?php endif; ?>
    </div>

    <?php
    // Handle checkout action
    if (isset($_POST['checkout'])) {
        takeOutAllItems();
        header("Location: transaction.php"); // Redirect to the transaction page
        exit();
    }
    ?>
    <?php Include("footer.php"); ?>
</body>
</html>

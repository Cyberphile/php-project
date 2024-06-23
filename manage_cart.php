<?php
session_start();

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        .btn {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <!-- Cart contents -->
    <h1>Cart</h1>
    <?php if (empty($cart_items)): ?>
        <p>No items in the cart</p>
    <?php else: ?>
        <ul>
            <?php foreach ($cart_items as $index => $cart_item): ?>
                <li><?php echo $cart_item['name']; ?> - $<?php echo $cart_item['price']; ?>
                    <form method="post">
                        <input type="hidden" name="index" value="<?php echo $index; ?>">
                        <button type="submit" name="delete" class="btn">Delete</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
        <p>Total Price: $<?php echo calculateTotalPrice($cart_items); ?></p>
        <form method="post">
            <button type="submit" name="takeout" class="btn">Take Out All</button>
        </form>
    <?php endif; ?>

    <?php
    // Handle delete and takeout actions
    if (isset($_POST['delete'])) {
        $index = $_POST['index'];
        removeItemFromCart($index);
        header("Location: mycart.php"); // Redirect to the same page to refresh the cart
        exit();
    }

    if (isset($_POST['takeout'])) {
        takeOutAllItems();
        header("Location: mycart.php"); // Redirect to the same page to refresh the cart
        exit();
    }
    ?>
</body>
</html>

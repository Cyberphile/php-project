<?php
session_start();
Include("login.php");

// Example menu data
$menu_items = array(
    array('name' => 'Arabica Delight', 'price' => 35.99),
    array('name' => 'Mocha Magic', 'price' => 39.99),  
    array('name' => 'Mocha Magic', 'price' => 39.99),    
    array('name' => 'Mocha Magic', 'price' => 39.99),   
    array('name' => 'Mocha Magic', 'price' => 39.99),   
    array('name' => 'Mocha Magic', 'price' => 39.99),   
    array('name' => 'Mocha Magic', 'price' => 39.99),   
    array('name' => 'Mocha Magic', 'price' => 39.99),   
    array('name' => 'Mocha Magic', 'price' => 39.99),   
    
    // Add more menu items as needed
);

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array(); // Initialize 'cart' as an empty array if it's not set
}

if (isset($_POST['add_to_cart'])) {
    $item_index = $_POST['item_index'];
    $item = $menu_items[$item_index];
    $_SESSION['cart'][] = $item;
    header('Location: mycart.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- custom css link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php print_r($_SESSION['cart']) ?>
    <!-- sub heading -->
    <div class="sub-heading">
        <h1>our menu</h1>
    </div>
    <!-- end -->

    <!-- menu section starts -->
    <section class="menu">
        <div class="box-container">
            <?php foreach ($menu_items as $index => $item): ?>
                <form method="post">
                    <div class="box">
                        <div class="image">
                            <!-- Placeholder image for demonstration -->
                            <img src="images/product-<?php echo ($index % 3) + 1; ?>.png" alt="">
                        </div>
                        <div class="content">
                            <h3><?php echo $item['name']; ?></h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <div class="price">$<?php echo $item['price']; ?> <span>$43.99</span></div>
                        </div>
                        <div class="icons">
                            <input type="hidden" name="item_index" value="<?php echo $index; ?>">
                            <button type="submit" name="add_to_cart"  class= "btn btn-outline-success"> Add to Cart</button>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>
        </div>
    </section>
    <!-- menu section ends -->

    <!-- footer section starts -->
    <?php
    Include("footer.php");
    ?>
    <!-- footer section ends -->

    <script src="script.js"></script>
</body>
</html>

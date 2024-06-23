<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baristo - In Your Service</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>  
    <!-- header -->

    <?php
    Include("login.php");
    ?>


    <!-- header ends-->

    <!-- home -->

    <section class="home" id="home">

        <div class="content">
            <h3>Baristo - At your Service</h3>
            <p>Step into our welcoming ambiance, where the aroma of freshly roasted beans fills the air and the sound of steaming milk creates a symphony of coffee perfection.</p>
            <a href="#" class="btn">Explore now </a>
        </div>

    </section>

    <!-- home ends -->

    <!-- offer -->

    <section class="banner-container">

        <div class="banner">
            <img src="images/banner-1.png" alt="">
            <div class="content">
                <span>special offer</span>
                <h3>upto 50% off</h3>
                <a href="menu.php" class="btn"> shop now</a>
            </div>
        </div>

        <div class="banner">
            <img src="images/banner-2.png" alt="">
            <div class="content">
                <span>special offer</span>
                <h3>Buy 1 get 1 FREE</h3>
                <a href="menu.php" class="btn"> shop now</a>
            </div>
        </div>

        <div class="banner">
            <img src="images/banner-3.png" alt="">
            <div class="content">
                <span>special offer</span>
                <h3>Apply "BD1ST" <br>to get 10% off</h3>
                <a href="menu.php" class="btn"> shop now</a>
            </div>
        </div>

    </section>

    <!-- offer ends -->

    <!-- speaciality -->

    <section class="offer">

        <div class="heading">
            <h3>our speaciality</h3>
        </div>

        <div class="box-container">

            <div class="box">
                <img src="images/offer-1.png" alt="">
                <h3>Baristo Signature Blend</h3>
                <p>Our proprietary blend of carefully selected beans, expertly roasted to perfection, delivering a harmonious balance of bold flavors and delightful nuances in every sip.</p>
            </div>

            <div class="box">
                <img src="images/offer-2.png" alt="">
                <h3>Artisanal Pour-Overs</h3>
                <p>Experience the meticulous art of pour-over brewing with our handcrafted single-origin coffees, showcasing the unique terroir and distinct characteristics of each region.</p>
            </div>

            <div class="box">
                <img src="images/offer-3.png" alt="">
                <h3>Seasonal Specials</h3>
                <p> Explore our rotating selection of seasonal specialties, featuring innovative flavor combinations and limited-time offerings inspired by the freshest ingredients and current trends.</p>
            </div>

            <div class="box">
                <img src="images/offer-4.png" alt="">
                <h3>Custom Creations</h3>
                <p>Unleash your creativity and design your own custom coffee creation with our wide array of premium syrups, alternative milks, and add-ons, tailored to your unique taste preferences.</p>
            </div>

        </div>

    </section>

    <!-- speaciality -->

    <!-- footer -->

    <?php
    Include("footer.php");
    ?>
     <!-- footer ends -->
     <script src="script.js"></script>

</body>
</html>


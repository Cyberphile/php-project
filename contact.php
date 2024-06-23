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
    
    <!-- header section starts -->

    <?php
    include("login.php");
    ?>


    <!-- header section ends -->


    <!-- sub heading -->

    <div class="sub-heading">
        <h1>contact us</h1>
    </div>

    <!-- end -->

    <!-- contact us section starts -->

    <section class="contact">

        <div class="row">

            <form action="book_table.php" method="POST">
                <h3>book a table</h3>

                <div class="inputBox">
                    <input type="text" placeholder="Enter Your Name" class="box" name="name">
                    <input type="email" placeholder="Enter Your Email" class="box" name="email">
                </div>

                <div class="inputBox">
                    <input type="tel" placeholder="Enter Your Phone Number" class="box" name="phone">
                    <input type="number" placeholder="How Many Members" class="box" name="num_members">
                </div>
                <textarea placeholder="Your Message" cols="30" rows="10" name="message"></textarea>
                <input type="submit" value="Send Message" class="btn">

            </form>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3445.9293944930487!2d-97.7546682884772!3d30.267592874706946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8644b50e25cd8c2d%3A0x3fa3976be9ecaa5!2sMerit%20Coffee!5e0!3m2!1sen!2s!4v1709320735877!5m2!1sen!2s" width="550" allowfullscreen="" loading="lazy" class="map"></iframe>

        </div>
    </section>

    <!-- contact us section ends -->
    <!-- footer section starts -->

    <?php
    Include("footer.php");
    ?>

    <!-- footer section ends -->
    <script src="script.js"></script>
</body>
</html>
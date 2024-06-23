<?php
include('login.php');
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

    <style>
    .display_review {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        
        .box h3 {
            font-size: 24px;
            font-weight: bold;
        }
        
        .box h4 {
            font-size: 18px;
            color: #666;
            margin-top: 5px;
        }
        
        .box .stars {
            color: #FFD700;
            margin: 10px 0;
        }
        
        .box p {
            font-size: 16px;
            color: #666;
        }
        
        

        .review-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.review-container .row {
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
    margin-top: 80px;
}

.review-container .box {
    background-color: #f9f9f9;
            border-radius: 10px;
            padding: 20px;
            margin: 20px;
            width: 300px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Add more CSS styles as needed */

</style>
</head>
<body>
    
    <!-- header section starts -->

   
    <!-- header section ends -->

    <!-- sub heading -->

    <div class="sub-heading">
        <h1>customer's review</h1>
    </div>

    <!-- end -->

    <!-- review section starts -->

    <?php include ("display_reviews.php"); ?>

    

<section class="comment-section">
    <div class="comment-form">
        <form action="add_review.php" method="post">
            <label class="comment-label" for="name">Name:</label><br>
            <input class="comment-input" type="text" id="name" name="name" required><br><br>
            
            <label class="comment-label" for="email">Email:</label><br>
            <input class="comment-input" type="email" id="email" name="email" required><br><br>
            
            <label class="comment-label" for="rating">Rating:</label><br>
            <select class="comment-select" id="rating" name="rating" required>
                <option value="5 stars">5 Stars</option>
                <option value="4 stars">4 Stars</option>
                <option value="3 stars">3 Stars</option>
                <option value="2 stars">2 Stars</option>
                <option value="1 stars">1 Star</option>
            </select><br><br>
            
            <label class="comment-label" for="comment">Comment:</label><br>
            <textarea class="comment-textarea" id="comment" name="comment" rows="4" required></textarea><br><br>
            
            <input class="comment-submit" type="submit" value="Submit Review">
        </form>
    </div>
</section>














    <!-- review section ends -->










    <!-- footer section starts -->

    <?php
    Include("footer.php");
    ?>
    <!-- footer section ends -->

    <script src="script.js"></script>

</body>
</html>
// cart.js

// Function to update the cart count on the navbar button
function updateCartCount() {
    $.ajax({
        type: 'GET',
        url: 'get_cart_count.php', // Path to your PHP script that returns the cart count
        success: function(response) {
            $('#cartButton').text('My Cart (' + response + ')');
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

// Call the function initially when the page loads
$(document).ready(function() {
    updateCartCount();
});

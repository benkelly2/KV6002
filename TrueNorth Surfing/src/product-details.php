<?php
session_start();
include("scripts/functions.php");
include("config.php");
echo headSetup("TNSC - Product Details", "../css/product-details.css");
echo headerSetup();
echo genNav(array("index.php" => "Home", "gallery.php" => "Gallery", "contact.php" => "Contact Us", "signup.php" => "Sign Up", "members.php" => "For Members", "shop.php" => "Shop", "admin.php" => "Admin"));
echo headerClose();
echo "<a href='shop.php' class='back-to-shop-btn'>← Back to Shop</a>";

echo bodyStart("Product Details:");


// Get the product ID from the URL query parameter
$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;

if ($product_id > 0) {
    // Load the product details using the product ID
    // This depends on how you store and retrieve your product data

    // For example, if you have a function like getProductById($id), you can use it here:
    $product = new Product();
    $product = $product->getById($product_id);

    if ($product) {
        // Display the product details (e.g., title, description, image, etc.)
        echo "<div class='product-details-container'>";
        echo "<div class='product-image-container'>";
        echo "<img src= '../TNSC_Pictures/TNSC_tshirt/shoplogo.png'  alt='" . $product->title . "' class='product-img'>";
        echo "</div>";
        echo "<div class='product-details'>";
        echo "<p><h2 class='product-title'>" . $product->title . "</h2> </p>";
        echo "<p class='product-price'>£" . number_format($product->price, 2) . "</p>";
        echo "<p class='product-description'>" . $product->description . "</p>";
        echo "<input type='number' id='quantity-" . $product_id . "' value='1' min='1' max='10' class='quantity-input' />";
        echo "<button onclick='addToBasket(" . $product_id . ")'>Add to basket</button>";        
        echo "</div>";
        echo "</div>";
        
        // Adrian Commit <<<<< Commit no.1 >>>>>>
        // Display the review submission form
        echo "<div class='review-form'>";
        echo "<h3>Submit a review:</h3>";
        echo "<form id='review-form'>";
        echo "<input type='number' id='rating' value='1' min='1' max='5' class='rating-input' />";
        echo "<textarea id='review-text' rows='4' cols='50' class='review-textarea'></textarea>";
        echo "<button type='submit'>Submit review</button>";
        echo "</form>";
        echo "</div>";

        // Display existing reviews
        echo "<div class='reviews-container'>";
        echo "<h3>Reviews:</h3>";
        // Fetch and display the approved reviews for the product
        $reviews = Review::getApprovedReviewsByProductId($product_id);
        if (count($reviews) > 0) {
            echo "<ul class='reviews-list'>";
            foreach ($reviews as $review) {
                echo "<li class='review-item'>";
                echo "<span class='review-rating'>Rating: " . $review->rating . "/5</span>";
                echo "<p class='review-text'>" . $review->review_text . "</p>";
                //echo "<p class='review-sentiment'>Sentiment: " . $review->sentiment . " (Score: " . $review->compound_score . ")</p>";
                echo "</li>";
            }
            echo "</ul>";
        } else {
          echo "<p>No reviews available for this product.</p>";
        }
        echo "</div>";
        // End of commit no.1
    } else {
        echo "Product not found.";
    }
} else {
    echo "Invalid product ID.";
}
?>

<script>
function addToBasket(productId) {
    // Send AJAX request to add product to basket
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Update basket count in the UI
            var count = parseInt(this.responseText);
            document.getElementById("basket-count").innerHTML = count;
        }
    };
    xhttp.open("POST", "scripts/add-to-basket.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    var quantity = document.getElementById("quantity-" + productId).value;
    xhttp.send("product_id=" + productId + "&quantity=" + quantity);

}

//ADRIAN COMMIT NO.2
const form = document.querySelector('#review-form');
const productId = <?= $product_id; ?>;

form.addEventListener('submit', async (event) => {
event.preventDefault();
const rating = document.querySelector('#rating').value;
const reviewText = document.querySelector('#review-text').value;

const formData = new FormData();
formData.append('product_id', productId);
formData.append('rating', rating);
formData.append('review_text', reviewText);

const response = await fetch('submit_review.php', {
  method: 'POST',
  body: formData
});

if (response.ok) {
  location.reload();
} else {
  console.error('Error submitting review');
}
});

// END OF COMMIT NO.2
</script>

<?php
echo genFooter(array("cookies.php" => "Cookies Policy", "privacy.php" => "Privacy Policy"));
echo bodyEnd();
?>

<?php include 'chatbot/chatbot.html'; ?>

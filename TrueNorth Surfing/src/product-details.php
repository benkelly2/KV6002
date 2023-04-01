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
        echo "<p class='product-price'>£" . $product->price . "</p>";
        echo "<p class='product-description'>" . $product->description . "</p>";
        echo "<input type='number' id='quantity-" . $product_id . "' value='1' min='1' max='10' class='quantity-input' />";
        echo "<button onclick='addToBasket(" . $product_id . ")'>Add to basket</button>";        
        echo "</div>";
        echo "</div>";
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
</script>

<?php
echo genFooter(array("cookies.php" => "Cookies Policy", "privacy.php" => "Privacy Policy"));
echo bodyEnd();
?>

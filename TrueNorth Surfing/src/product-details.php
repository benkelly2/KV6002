<?php
    session_start();
    include("scripts/functions.php");
    echo headSetup("TNSC - Product Details", "../css/product-details.css");
    echo headerSetup();
    echo genNav(array("index.php" => "Home", "gallery.php" => "Gallery", "contact.php" => "Contact Us", "signup.php" => "Sign Up", "members.php" => "For Members", "shop.php" => "Shop"));
    echo headerClose();
    echo bodyStart("Product Details:");
?>

<?php
    // Get the product ID from the URL query parameter
    $product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($product_id > 0) {
        // Load the product details using the product ID
        // This depends on how you store and retrieve your product data

        // For example, if you have a function like getProductById($id), you can use it here:
        $product = getProductById($product_id);

        if ($product) {
            // Display the product details (e.g., title, description, image, etc.)
            echo "<div class='product-details'>";
            echo "<h2 class='product-title'>" . $product['title'] . "</h2>";
            echo "<img src='" . $product['img'] . "' alt='" . $product['title'] . "' class='product-img'>";
            echo "<p class='product-price'>$" . $product['price'] . "</p>";
            echo "<p class='product-description'>" . $product['description'] . "</p>";
            echo "</div>";
        } else {
            echo "Product not found.";
        }
    } else {
        echo "Invalid product ID.";
    }
?>

<?php
    echo bodyEnd();
?>

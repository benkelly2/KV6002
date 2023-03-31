<?php
session_start();
include("scripts/functions.php");
include("config.php");
echo headSetup("TNSC - Basket", "../css/basket.css");
echo headerSetup();
echo genNav(array("index.php" => "Home", "gallery.php" => "Gallery", "contact.php" => "Contact Us", "signup.php" => "Sign Up", "members.php" => "For Members", "shop.php" => "Shop", "admin.php" => "Admin"));
echo headerClose();

if (isset($_SESSION["basket"]) && count($_SESSION["basket"]) > 0) {
    echo '<div class="basket-items">';
    foreach ($_SESSION["basket"] as $product_id) {
        $product = new Product();
        $product = $product->getById($product_id);
        if ($product) {
            echo '<div class="basket-item">';
            echo '<div class="item-details">';
            echo '<h2 class="item-title">' . $product->title . '</h2>';
            echo '<p class="item-price">£' . $product->price . '</p>';
            echo '<p class="item-description">' . $product->description . '</p>';
            echo '<button onclick="removeFromBasket(' . $product_id . ')">Remove from basket</button>';
            echo '</div>';
            echo '</div>';
        }
    }
    echo '</div>';
    echo '<div class="basket-summary">';
    echo '<div class="total-items">';
    echo '<p>Total items: ' . count($_SESSION["basket"]) . '</p>';
    echo '</div>';
    echo '<div class="total-price">';
    echo '<p>Total price: £' . array_reduce($_SESSION["basket"], function($acc, $product_id) {
        $product = new Product();
        $product = $product->getById($product_id);
        return $acc + $product->price;
    }, 0) . '</p>';
    echo '</div>';
    echo '<div class="checkout-btn">';
    echo '<a href="checkout.php">Checkout</a>';
    echo '</div>';
    echo '</div>';
} else {
    echo '<p>Your basket is empty.</p>';
}
echo '<script>
function removeFromBasket(product_id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            location.reload();
        }
    };
    xhttp.open("POST", "../src/scripts/remove-from-basket.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("product_id=" + product_id);
}


</script>';

echo bodyEnd();
?>

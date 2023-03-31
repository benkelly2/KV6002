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
    $product_instance = new Product();
    foreach ($_SESSION["basket"] as $product_id => $item_quantity) {
        $product = $product_instance->getById($product_id);
        if ($product) {
            echo '<div class="basket-item">';
            echo '<div class="item-details">';
            echo '<h2 class="item-title">' . $product->title . '</h2>';
            echo '<p class="item-price">£' . $product->price . ' x ' . $item_quantity . '</p>';
            echo '<p class="item-description">' . $product->description . '</p>';
            echo '<button onclick="removeFromBasket(' . $product_id . ')">Remove from basket</button>';
            echo '</div>';
            echo '</div>';
        }
    }
    echo '</div>';
    echo '<div class="basket-summary">';
    echo '<div class="total-items">';
    $total_items = array_reduce($_SESSION["basket"], function($acc, $quantity) {
        return $acc + $quantity;
    }, 0);
    echo '<p>Total items: ' . $total_items . '</p>';
    echo '</div>';
    echo '<div class="total-price">';
    $total_price = 0;
    foreach ($_SESSION["basket"] as $product_id => $item_quantity) {
        $product = $product_instance->getById($product_id);
        if ($product) {
            $total_price += $product->price * $item_quantity;
        }
    }
    echo '<p>Total price: £' . $total_price . '</p>';

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

echo genFooter(array("cookies.php" => "Cookies Policy", "privacy.php" => "Privacy Policy"));
echo bodyEnd();
?>

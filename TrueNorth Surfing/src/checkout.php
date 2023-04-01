<?php
session_start();
include("scripts/functions.php");
include("config.php");
echo headSetup("TNSC - Checkout", "../css/checkout.css");
echo headerSetup();
echo genNav(array("index.php" => "Home", "gallery.php" => "Gallery", "contact.php" => "Contact Us", "signup.php" => "Sign Up", "members.php" => "For Members", "shop.php" => "Shop", "admin.php" => "Admin"));
echo headerClose();

echo '<h1>Checkout</h1>';

echo '<div class="checkout-form-container">';
echo '<form action="../src/shopSumUp.php" method="POST" class="checkout-form">';

echo '<h2>Shipping Details</h2>';
echo '<label for="name">Full Name:</label>';
echo '<input type="text" id="name" name="name" required>';

echo '<label for="address">Address:</label>';
echo '<input type="text" id="address" name="address" required>';

echo '<label for="city">City:</label>';
echo '<input type="text" id="city" name="city" required>';

echo '<label for="postcode">Postcode:</label>';
echo '<input type="text" id="postcode" name="postcode" required>';

echo '<label for="country">Country:</label>';
echo '<input type="text" id="country" name="country" required>';

echo '<button type="submit" class="place-order">Proceed to payment</button>';

echo '</form>';
echo '</div>';

echo genFooter(array("cookies.php" => "Cookies Policy", "privacy.php" => "Privacy Policy"));
echo bodyEnd();
?>

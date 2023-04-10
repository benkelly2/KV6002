<?php
    session_start();
    include("scripts/functions.php");
    echo headSetup("TNSC - Shop", "../css/shop.css");
    echo headerSetup();
    echo genNav(array("index.php" => "Home", "gallery.php" => "Gallery", "contact.php" => "Contact Us", "signup.php" => "Sign Up", "members.php" => "For Members", "shop.php" => "Shop", "admin.php" => "Admin"));
    echo headerClose();
    echo bodyStart("True North Surf Club Shop:");
?>
<div class="product-grid">
    <!-- The product grid will be generated here -->
</div>
<script src="scripts/shop_items.php"></script>
<?php
    require("scripts/shop_items.php");
    echo genFooter(array("cookies.php" => "Cookies Policy", "privacy.php" => "Privacy Policy"));
    echo bodyEnd();
?>

<?php include 'chatbot/chatbot.html'; ?>

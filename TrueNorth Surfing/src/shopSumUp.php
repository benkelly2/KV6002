<?php
session_start();
include("../src/scripts/functions.php"); // Update the path based on your project structure
echo headSetup("TNSC - Basket", "../css/basket.css");
echo headerSetup();
echo genNav(array("index.php" => "Home", "gallery.php" => "Gallery", "contact.php" => "Contact Us", "signup.php" => "Sign Up", "members.php" => "For Members", "shop.php" => "Shop", "admin.php" => "Admin"));
echo headerClose();
echo '<div class="sumup-container">'; // Add a container for the SumUp content

echo '<h1>Payment Details</h1>';

// Add the SumUp content
echo <<<HTML
    <div id="sumup-card"></div>
    <script
      type="text/javascript"
      src="https://gateway.sumup.com/gateway/ecom/card/v2/sdk.js"
    ></script>
    <script type="text/javascript">
      SumUpCard.mount({
        checkoutId: '2ceffb63-cbbe-4227-87cf-0409dd191a98',
        onResponse: function (type, body) {
          console.log('Type', type);
          console.log('Body', body);
        },
      });
    </script>
HTML;

echo '</div>'; // Close the container
echo genFooter(array("cookies.php" => "Cookies Policy", "privacy.php" => "Privacy Policy"));
echo bodyEnd();
?>

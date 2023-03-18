<?php
    //ini_set("session.save_path", "WHEREVER THE SESSION DATA FILE WILL BE");
    session_start();
    include("scripts/functions.php");
    echo headSetup("../css/shop.css");
    echo headerSetup();
    echo genNav(array("index.php" => "Home", "gallery.php" => "Gallery", "contact.php" => "Contact Us", "signup.php" => "Sign Up", "members.php" => "For Members", "shop.php" => "Shop"));
    echo headerClose();
    echo bodyStart("True North Surf Club Shop:");
?>
<div class="Shop-Item">
    <div id="shop-img">
        <h3>TNSC tshirt</h3>
        <img src="../TNSC_Pictures/TNSC_tshirt/11fdc54b-48c6-42f6-ac37-9dc6fe538ef6.jpeg">
    </div>
    <div class="shop-desc">
        Description: TNSC T-Shirt is a vibe!!!!
    </div>
</div>
<?php
    echo bodyEnd();
?>

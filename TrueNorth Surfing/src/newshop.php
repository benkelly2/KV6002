<?php
    //ini_set("session.save_path", "WHEREVER THE SESSION DATA FILE WILL BE");
    session_start();
    include("scripts/updated_functions.php");
    echo headSetup("TNSC - Shop", "../css/shop.css");
    echo bodyStartSetup();
    echo genNav(array("index.php" => "Home", "gallery.php" => "Gallery", "contact.php" => "Contact Us", "signup.php" => "Sign Up", "members.php" => "For Members", "newshop.php" => "Shop", "admin.php" => "Admin", "admin.php" => "Admin"));
    echo bodyClose("True North Surf Club Shop:");
    ?>
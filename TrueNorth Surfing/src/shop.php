<?php
    ini_set("session.save_path", "WHEREVER THE SESSION DATA FILE WILL BE");
    session_start();
    include("scripts/functions.php");
    echo makePageStart("True North Surf Club Shop", "shop.css")
    echo makeMain("True North Surf Club Shop");
    echo makeNav("Navigation Menu");
    echo makeNavOptions(array("index.php" => "Home", "gallery.php" => "Gallery", "shop.php" => "TNSC Shop", "members.php" => "Members Area", "signup.php" => "Sign Up"));
    echo makeMain("True North Surf Club Shop");
    echo isLogged();
    echo makeBody("Shop Items etc");
    echo endBody();
    echo makeFooter("True North Surf Club Merchandise Shop 2023")
    ?>
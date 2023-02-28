<?php
    //ini_set("session.save_path", "WHEREVER THE SESSION DATA FILE WILL BE");
    session_start();
    include("scripts/functions.php");
    echo makePageStart("True North Surf Club Shop", "../css/shop.css");
    echo makeNav("Navigation Menu");
    echo makeNavOptions(array("index.php" => "Home", "gallery.php" => "Gallery", "shop.php" => "TNSC Shop", "members.php" => "Members Area", "signup.php" => "Sign Up"));
    echo makeMain('<a href="../index.php"><img class="logo-icon" src="../img/TrueNorthSurfClubLogo.png" alt="True North Surf Club Logo"/></a>');
    echo isLogged();
    echo makeBody("Shop Items etc");
    echo endBody();
    echo makeFooter("True North Surf Club Merchandise Shop 2023")
    ?>
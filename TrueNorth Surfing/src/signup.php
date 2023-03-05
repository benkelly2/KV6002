<?php
    //ini_set("session.save_path", "WHEREVER THE SESSION DATA FILE WILL BE");
    session_start();
    include("scripts/updated_functions.php");
    echo headSetup("../css/shop.css");
    echo bodyStartSetup();
    echo genNav(array("index.php" => "Home", "gallery.php" => "Gallery", "contact.php" => "Contact Us", "signup.php" => "Sign Up", "members.php" => "For Members", "shop.php" => "Shop"));
    ?>
    <div class="box">
        <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdI7BTC_c9MHynQfB8SoPyGgMY0m-b5uuZwmUwge26qqdBOlg/viewform" width="60%" height="1200" style="border:1px solid black;">
        </iframe>
    </div>
    <?php
    echo bodyClose("Sign-up Form");
    ?>
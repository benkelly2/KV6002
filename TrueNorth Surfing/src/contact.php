<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/contact.css">
    <script type="text/javascript" src="./scripts/contact_form.js"></script>
    <title>Contact</title>
</head>
<body>

<<<<<<< HEAD
    <div class="header">
        <a href="../index.php"><img class="logo-icon" src="../img/TrueNorthSurfClubLogo.png" alt="True North Surf Club Logo"/></a>
        <div class="header-right">
            <a href="../index.php">Home</a>
            <a href="gallery.php">Gallery</a>
            <a class="active" href="contact.php">Contact Us</a>
            <a href="signup.php">Sign Up</a>
            <a href="members.php">For Members</a>
            <a href="shop.php">Shop</a>
        </div>
    </div>

    <h1>Contact Page</h1>

    <div class="form-container" id="contactform">  
        <form action="./scripts/processForm.php" method="post" name="contact_form">
=======
<?php
    //ini_set("session.save_path", "WHEREVER THE SESSION DATA FILE WILL BE");
    session_start();
    include("scripts/functions.php");
    echo headSetup("../css/contact.css");
    echo headerSetup();
    echo genNav(array("index.php" => "Home", "gallery.php" => "Gallery", "contact.php" => "Contact Us", "signup.php" => "Sign Up", "members.php" => "For Members", "shop.php" => "Shop"));
    echo headerClose();
    echo bodyStart("Contact Form:");
?>
    <div class="form-container" id="sign-up-form">  
        <form action="./scripts/processForm.php">
>>>>>>> cca98f154c0cc7d9d6b3203350ad6c4e8ea25473
            <div>
                <label class="nameLabel">Your Name</label>
                <input type="text" class="name" placeholder="Enter Your Name" name="name" required>
            </div>

            <div>
                <label class="emailLabel">Email</label>
                <input type="text" class="email" placeholder="Enter Email" name="email" required>
            </div>

            <div>
                <label class="messageLabel">Message</label>
                <input type="text" class="message" placeholder="Enter Message" name="message" required>
            </div>
            <input type="submit" class="submit" value="Submit">
        </form>
    </div>
<?php
echo bodyEnd();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/contact.css">
    <title>Contact</title>
</head>
<body>

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
            <div>
                <label class="firstnameLabel">First Name</label>
                <input type="text" class="firstname" placeholder="Enter First Name" name="firstname" required>
            </div>

            <div>
                <label class="lastnameLabel">Surname</label>
                <input type="text" class="lastname" placeholder="Enter Surname" name="surname" required>
            </div>

            <div>
                <label class="emailLabel">Email</label>
                <input type="text" class="email" placeholder="Enter Email" name="email" required>
            </div>

            <div>
                <label class="passwordLabel">Password</label>
                <input type="password" class="password" placeholder="Enter Password" name="password " required>
            </div>

            <div>
                <label class="passwordLabel2">Re-enter password</label>
                <input type="password" class="password2" placeholder="Re-enter Password" name="password2" required>
            </div>

            <input type="submit" class="submit" value="Submit">
        </form>
    </div>
<?php
echo bodyEnd();
?>
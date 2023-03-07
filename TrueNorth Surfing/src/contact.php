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


</body>
</html>
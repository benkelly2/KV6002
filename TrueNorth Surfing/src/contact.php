<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/contact.css">
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

    <div class="form-container" id="contact-form">  
        <form action="./scripts/processForm.php">
            <div>
                <label class="nameLabel">Name</label>
                <input type="text" class="name" placeholder="Enter First Name" name="firstname" required>
            </div>

            <div>
                <label class="emailLabel">Email</label>
                <input type="text" class="email" placeholder="Enter Email" name="email" required>
            </div>

            <div>
                <label class="subjectLabel">Subject</label>
                <input type="password" class="subject" placeholder="Enter Password" name="password " required>
            </div>

            <div>
                <label class="messageLabel">Message</label>
                <input type="password" class="message" placeholder="Re-enter Password" name="password2" required>
            </div>

            <input type="submit" class="submit" value="Submit">
        </form>
    </div>

</body>
</html>
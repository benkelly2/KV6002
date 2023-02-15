<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/signup.css">
    <title>Sign Up</title>
</head>
<body>

    <div class="header">
        <a href="../index.php"><img class="logo-icon" src="../img/TrueNorthSurfClubLogo.png" alt="True North Surf Club Logo"/></a>
        <div class="header-right">
            <a href="../index.php">Home</a>
            <a href="gallery.php">Gallery</a>
            <a href="contact.php">Contact Us</a>
            <a class="active" href="signup.php">Sign Up</a>
            <a href="members.php">For Members</a>
            <a href="shop.php">Shop</a>
        </div>
    </div>

    <h1>Sign Up Here!</h1>
    <p>This page may end up being part of the same page as contact.</p>
    <form action=""> <!-- Change action to php script when ready -->
        <div class="container">
            <h2>Sign-up Form</h2>
            <p>Sign up to become a True North member here:</p>

            <label >First Name</label> <!-- maybe make this bold with CSS -->
            <input type="text" placeholder="Enter First Name" name="firstname" required>
            
            <label >Surname</label> <!-- maybe make this bold with CSS -->
            <input type="text" placeholder="Enter Surname" name="surname" required>

            <label >Email</label> <!-- maybe make this bold with CSS -->
            <input type="text" placeholder="Enter Email" name="email" required>

            <label >Password</label> <!-- maybe make this bold with CSS -->
            <input type="password" placeholder="Enter Password" name="password " required>

            <button class="sign-up-button" label="Sign Up"></button> <!-- Should add action=signUpFunction() or something -->
        </div>
    </form>

</body>
</html>
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

    <h1>Sign-Up Page</h1>
    
    <div class="container">

        <h2>Sign-Up Form</h2>
        <p>Sign up to become a True North member here...</p>
        
        <div class="form-container" id="sign-up-form"> <!-- Change action to php script when ready -->    
            <form action="./scripts/processForm.php">
                <div>
                    <label class="firstnameLabel">First Name</label> <!-- maybe make this bold with CSS -->
                    <input type="text" class="firstname" placeholder="Enter First Name" name="firstname" required>
                </div>

                <div>
                    <label class="lastnameLabel">Surname</label> <!-- maybe make this bold with CSS -->
                    <input type="text" class="lastname" placeholder="Enter Surname" name="surname" required>
                </div>

                <div>
                    <label class="emailLabel">Email</label> <!-- maybe make this bold with CSS -->
                    <input type="text" class="email" placeholder="Enter Email" name="email" required>
                </div>

                <div>
                    <label class="passwordLabel">Password</label> <!-- maybe make this bold with CSS -->
                    <input type="password" class="password" placeholder="Enter Password" name="password " required>
                </div>

                <input type="submit" class="submit" value="Submit">
            </form>
        </div>
    </div>

</body>
</html>
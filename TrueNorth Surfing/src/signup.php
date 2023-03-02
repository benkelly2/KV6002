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

        <!-- This will need to be swapped with the TNSC google signup form -->
        <iframe 
            src="https://docs.google.com/forms/d/e/1FAIpQLSc1ffmwuMHNLCSQq6YtElYKni3DgyINzYbPN_EBDzLlTR1SHw/viewform?embedded=true" 
            width="640" 
            height="1280" 
            frameborder="0" 
            marginheight="0" 
            marginwidth="0"
            
        >
            Loading…
        </iframe>
        
        <!-- START OF FORM - PROBS WONT USE -------------------------->
        <!-- <div class="form-container" id="sign-up-form">  
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
        </div> -->
        <!-- END OF FORM - PROBS WONT USE -------------------------->

    </div>

</body>
</html>
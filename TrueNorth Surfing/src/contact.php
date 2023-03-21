<?php
    //ini_set("session.save_path", "WHEREVER THE SESSION DATA FILE WILL BE");
    session_start();
    include("scripts/functions.php");
    echo headSetup("TNSC - Contact", "../css/contact.css");
    echo headerSetup();
    echo genNav(array("index.php" => "Home", "gallery.php" => "Gallery", "contact.php" => "Contact Us", "signup.php" => "Sign Up", "members.php" => "For Members", "shop.php" => "Shop", "admin.php" => "Admin"));
    echo headerClose();
    echo bodyStart("Contact Form:");
?>
    <div class="form-container" id="contact-form">  
        <form action="./scripts/processForm.php">
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
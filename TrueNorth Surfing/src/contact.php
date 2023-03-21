<?php
//ini_set("session.save_path", "WHEREVER THE SESSION DATA FILE WILL BE");
session_start();
include("scripts/functions.php");
echo headSetup("TNSC - Contact Us","../css/contact.css");
echo headerSetup();
echo genNav(array("index.php" => "Home", "gallery.php" => "Gallery", "contact.php" => "Contact Us", "signup.php" => "Sign Up", "members.php" => "For Members", "shop.php" => "Shop", "admin.php" => "Admin"));
echo headerClose();
echo bodyStart("Contact Us");
if (!isset($_GET['message'])) {
?>
<div class="form-container" id="contactform">  
    <form action="./scripts/processForm.php" method="post" name="contact_form">
        <div>
            <label class="nameLabel">Your Name</label>
            <input id="field" type="text" placeholder="Enter Your Name" name="name" required>
        </div>

        <div>
            <label class="emailLabel">Email</label>
            <input id="field" type="text" placeholder="Enter Email" name="email" required>
        </div>

        <div>
            <label class="messageLabel">Message</label>
            <textarea id="messagefield" type="text" placeholder="Enter Message" name="message" required></textarea>
        </div>
        <input type="submit" class="submit" value="Submit">
    </form>
</div>
<?php
}
if (isset($_GET['message'])) {
    // get the message and sanitize it
    $message = htmlspecialchars($_GET['message']);
    
    // display the message in a pop-up
    if($_GET['message'] == 'Email sent successfully'){
        echo '<script>alert("Email sent successfully.")</script>';
    }
    else{
        echo '<script>alert("Error sending email. You will be redirected in 10 seconds.");setTimeout(function(){location.href="contact.php";},10000);</script>';
    }
?>
<div id="thankyou"><p font-size="75px">Thanks for your message! We will be in touch soon.</p></div>

<?php
}
echo genFooter(array("cookies.php" => "Cookies Policy", "privacy.php" => "Privacy Policy"));
echo bodyEnd();
?>

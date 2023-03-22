
<?php
    //ini_set("session.save_path", "WHEREVER THE SESSION DATA FILE WILL BE");
    session_start();
    include("scripts/functions.php");
    echo headSetup("TNSC - Sign Up", "../css/signup.css");
    echo headerSetup();
    echo genNav(array("index.php" => "Home", "gallery.php" => "Gallery", "contact.php" => "Contact Us", "signup.php" => "Sign Up", "members.php" => "For Members", "shop.php" => "Shop", "admin.php" => "Admin"));
    echo headerClose();
    echo bodyStart("Sign-Up Form:");
?>
    <div class="box">
        <!-- <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSdI7BTC_c9MHynQfB8SoPyGgMY0m-b5uuZwmUwge26qqdBOlg/viewform" width="50%" height="1200" style="border:1px solid black; border-radius:12px;">
        </iframe> -->
    </div>

    <div class="form-container">
        <form method="POST">
            <h2>TNSC Membership Form</h2>
            <div>
                <label class="emailLabel">Email</label>
                <input type="text" class="email" placeholder="Enter Email" name="email" required>
            </div>        
            <div>
                <label class="firstNameLabel">First Name</label>
                <input type="text" class="firstName" placeholder="Enter Your First Name" name="firstName" required>
            </div>
            <div>
                <label class="lastNameLabel">Last Name</label>
                <input type="text" class="lastName" placeholder="Enter Your Last Name" name="lastName" required>
            </div>
            <div>
                <label class="nicknameLabel">Preferred name/nickname (if different)</label>
                <input type="text" class="nickname" placeholder="Enter Your Nickname" name="nickname" >
            </div>
            <div>
                <label class="dobLabel">Date of Birth (Membership is 18+)</label>
                <input type="text" class="dob" placeholder="Enter Your Date of Birth" name="dob" required>
            </div>
            <div>
                <label class="phoneNoLabel">Mobile phone number</label>
                <input type="text" class="phoneNo" placeholder="Enter Your Mobile phone number" name="phoneNo" required>
            </div>
            <div>
                <label class="postcodeLabel">PostCode</label>
                <input type="text" class="postcode" placeholder="Enter Your Postcode" name="postcode" required>
            </div>
            <div>
                <label class="addressLabel">Address</label>
                <input type="text" class="address" placeholder="Enter Your Address" name="address" required>
            </div>
            <div>
                <label class="surfAbilityLabel">Surfing Ability</label>
                <div class="surfAbility-radio-container">
                    <div class="radio-item">
                        <input type="radio" id="neverSurfed" name="surfAbility" value="neverSurfed" >
                        <label for="neverSurfed">“I never tried surfing before but I know how to swim.”</label>
                    </div>
                    <br>
                    <div class="radio-item">
                        <input type="radio" id="rarelySurfed" name="surfAbility" value="rarelySurfed" >
                        <label for="rarelySurfed">“I’ve tried surfing before, only a few times. I still struggle with the basics: paddling & popping up.”</label>
                    </div>
                    <br>
                    <div class="radio-item">
                        <input type="radio" id="hasSurfed" name="surfAbility" value="hasSurfed" >
                        <label for="hasSurfed">"I’m able to stand up and go straight on a wave, with decent control.”</label>
                    </div>
                    <br>
                    <input type="radio" id="canSurf" name="surfAbility" value="canSurf" >
                    <label for="canSurf">"I can paddle 'Past the Break', catch 'Unbroken Waves' by myself and go Left & Right on the face of the wave."</label>
                </div>
            </div>
            <div>
                <label class="notesLabel">We're nosey, how did you hear about us?</label>
                <input type="text" class="notes" placeholder="Let us know..." name="notes">
            </div>
            <input type="submit" class="submit" value="Submit">
        </form>
    </div>

<?php
    include("./scripts/database.php");
    try {
        http_response_code(200);

        // Connect to database
        $db = new Database("../db/truenorth.sqlite");
        $sql = "INSERT INTO members (email, fname, lname, nickname, dob, phoneNo, postcode, address, surfAbility, notes)
                VALUES ('".$_POST['email']."', '".$_POST['firstName']."', '".$_POST['lastName']."', '".$_POST['nickname']."', 
                '".$_POST['dob']."', '".$_POST['phoneNo']."', '".$_POST['postcode']."', '".$_POST['address']."', '".$_POST['surfAbility']."', 
                '".$_POST['notes']."');";
        $params = [];

        $queryResult = $db->executeSQL($sql, $params);

    } catch (Exception $e) {
        http_response_code(500);
        echo($ex);
    }

    echo bodyEnd();
?>

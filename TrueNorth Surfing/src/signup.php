<?php
    $action = isset( $_GET['action'] ) ? $_GET['action'] : "";
    session_start();
    include("scripts/functions.php");
    include("./scripts/database.php");
    include("config.php");
    echo headSetup("TNSC - Sign Up", "../css/signup.css");
    echo headerSetup();
    echo genNav(array("index.php" => "Home", "gallery.php" => "Gallery", "contact.php" => "Contact Us", "signup.php" => "Sign Up", "members.php" => "For Members", "shop.php" => "Shop", "admin.php" => "Admin"));
    echo headerClose();
    echo bodyStart("Sign-Up Form");

    switch ( $action ) {
        case 'signedUp':
            signedUp();
            break;
        default:
        signUp();
    }
    

function signUp() {
    $results = array();

    if(isset($_POST['submit'])) {
        
            echo json_encode($_POST);
            // User has posted the add event form: save the new event
            $user = new user;
            
            $user->storeFormValues( $_POST );
            $user->insert();
            header( "Location: signup.php?action=signedUp" );
        
            } 
            else {
        
            // User has not posted the event edit form yet: display the form
            $results['user'] = new user;
            require( TEMPLATE_PATH . "/signupForm.php" );
            }
}
function signedUp(){?>
    <div id="adminHeader">
    <p>You have Signed Up Please Wait for a admin to confirm your payment and then you will be given access to the members only area</p>
  </div>
  <?php 
}
echo bodyEnd();
echo genFooter(array("cookies.php" => "Cookies Policy", "privacy.php" => "Privacy Policy"));

?>
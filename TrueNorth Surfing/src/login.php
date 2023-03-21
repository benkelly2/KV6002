<?php
require('config.php');
include("scripts/functions.php");

session_start();

$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";

if ( $action != "login" && $action != "logout" && !$username ) {
    login();
    exit;
  }

echo headSetup("TNSC - Home", "../css/style.css");
echo headerSetup();
echo genNav(array("index.php" => "Home", "gallery.php" => "Gallery", "contact.php" => "Contact Us", "signup.php" => "Sign Up", "members.php" => "For Members", "shop.php" => "Shop", "admin.php" => "Admin"));
echo headerClose();
echo bodyStart("True North Surf Club");

switch ( $action ) {
    case 'login':
        login();
        break;
      case 'logout':
        logout();
        break;
    default:
        loggedIn();
      }



function login() {
  $results = array();
  $results['pageTitle'] = "Login";

  if (isset($_POST['login'])) {
      // Connect to the database
      $db_path = '../db/eventsDB.db';
      $conn = new PDO( 'sqlite:'.$db_path );
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "SELECT * FROM user WHERE username = :username";
      $st = $conn->prepare( $sql );
      $st->bindValue( ":username", $_POST['username'], PDO::PARAM_STR );
      $st->execute();
      $user = $st->fetch(PDO::FETCH_ASSOC);

      if ($user && password_verify($_POST['password'], $user['password'])) {
          // Login successful: Create a session and redirect to the homepage
          $_SESSION['username'] = $user['username'];
          $_SESSION['member_permision'] = $user['membership'];
          $_SESSION['admin_permision'] = $user['admin'];
          header("Location: login.php");
          exit;
      } else {
          // Login failed: display an error message to the user
          $results['errorMessage'] = "Incorrect username or password. Please try again.";
          require(TEMPLATE_PATH . "/loginForm.php");
      }
  } else {
      // Login form not posted
      require(TEMPLATE_PATH . "/loginForm.php");
  }
}
//Logout Function
function logout() {
    unset( $_SESSION['username']);
    header( "Location: admin.php" );
  }
function loggedIn() {?>
    <div id="adminHeader">
    <p>You are logged in as <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a href="login.php?action=logout"?>Log out</a></p>
  </div>
  <?php  
}
  echo bodyEnd();
    
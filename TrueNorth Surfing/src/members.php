<?php
    //The members page shows a list of the available events

    require('config.php');
    session_start();
    $action = isset( $_GET['action'] ) ? $_GET['action'] : "";
    $username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";
    $admin_permision = isset( $_SESSION['admin_permision'] ) ? $_SESSION['admin_permision'] : "";
    $member_permision = isset( $_SESSION['member_permision'] ) ? $_SESSION['member_permision'] : "";
    
    
    include("scripts/functions.php");
    echo headSetup("TNSC - Members Page", "../css/members.css");
    echo headerSetup();
    echo genNav(array("index.php" => "Home", "gallery.php" => "Gallery", "contact.php" => "Contact Us", "signup.php" => "Sign Up", "members.php" => "For Members", "shop.php" => "Shop", "admin.php" => "Admin"));
    echo headerClose();
    echo bodyStart("Members Page");
    
    
    if ( $action != "login" && $action != "logout" && !$username )  {
        memberlogin();
        exit;
      }
    if ( !$member_permision == 1 && !$admin_permision == 1){
        memberLogin();
      exit;
    
    }



    switch ( $action ) {
      case 'viewEvent':
        viewEvent();
        break;
        case 'editEvent':
            editEvent();
            break;
        case 'addEvent':
            addEvent();
            break;
      default:
       memberContent();
    }
    
    //Members have to logged in to view content

    function memberLogin(){
        echo "Verified Members Only Area, please login with a verified account";
        ?>
        <div id="adminLogin">
          <a href="login.php"?>Log In</a></p>
        </div>
        <?php
        echo "If you dont have an account please sign up and wait for an organiser to verify you"
        ?>
        <div id="adminLogin">
          <a href="signup.php"?>Sign Up</a></p>
        </div>
        <?php
          echo genFooter(array("cookies.php" => "Cookies Policy", "privacy.php" => "Privacy Policy"));
        ?>
        <?php
  }




    function viewEvent(){
        $event = new Event();
        $event = $event->getById(2);
        require( TEMPLATE_PATH . "/viewEvent.php");
    
    }
    
    function memberContent(){
      ?>
      <!-- HTML code -->
      <div class="container">
        <div class="events-box">
          <h2>Events</h2>
          <?php
          $events = new Event();
          $events = $events->getList(1000);
          foreach ($events as $event) {
            if ($event->post_display == 1){
              require( TEMPLATE_PATH . "/viewEvent.php");
            }
          }
          ?>
        </div>
        <div class="codes-box">
          <h2>Discount Codes</h2>
          <table>
            <thead>
              <tr>
                <th>Company</th>
                <th>Code</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $codes = new Discount();
              $codes = $codes->getList();
              foreach ($codes as $code) {
                if ($code->code_display == 1){
                  require( TEMPLATE_PATH . "/viewDiscount.php");
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
        <?php
        
    }
    echo genFooter(array("cookies.php" => "Cookies Policy", "privacy.php" => "Privacy Policy"));
    echo bodyEnd();
    ?>
<?php

require('config.php');
session_start();
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";
$admin_permision = isset( $_SESSION['admin_permision'] ) ? $_SESSION['admin_permision'] : "";


include("scripts/functions.php");
echo headSetup("TNSC - Home", "../css/style.css");
echo headerSetup();
echo genNav(array("index.php" => "Home", "gallery.php" => "Gallery", "contact.php" => "Contact Us", "signup.php" => "Sign Up", "members.php" => "For Members", "shop.php" => "Shop", "admin.php" => "Admin"));
echo headerClose();
echo bodyStart("Admin Page");


if ( $action != "login" && $action != "logout" && !$username )  {
    login();
    exit;
  }
if ( !$admin_permision == 1){
  adminLogin();
  exit;

}

switch ( $action ) {
    case 'login':
        login();
        break;
    case 'login':
      adminLogin();
      break;
      case 'logout':
        logout();
        break;
    case 'editEvent':
        editEvent();
        break;
    case 'addEvent':
        addEvent();
        break;
    case 'deleteEvent':
        deleteEvent();
        break;
    case 'editCode':
      editCode();
      break;
    case 'addCode':
        addCode();
        break;
    case 'deleteCode':
        deleteCode();
        break;

    case 'viewEvents':
      listEvents();
      break;
    case 'viewCodes':
        listCodes();
        break;
  default:
    adminHome();
}

function login() {
  header('Location: login.php?action=login');
}
//Logout Function
function logout() {

    header( "Location: login.php?action=logout" );
  }
function adminLogin(){
      echo "Admin Only Area, please Login with a admin enabled account";
      ?>
      <div id="adminLogin">
        <a href="login.php"?>Log In</a></p>
      </div>
      <?php
}

function editEvent(){
        $results = array();
        $results['pageTitle'] = "Edit Event";
        $results['formAction'] = 'editEvent';
    
        if ( isset( $_POST['saveChanges'] ) ) {
    
            // User has posted the event edit form: save the edited event
            if ( !$event = Event::getById( (int)$_POST['event_id'] ) ) {
                header( "Location: admin.php?error=eventNotFound&action=viewEvents" );
                return;
              }
          
              $event->storeFormValues( $_POST );
              $event->update();
              header( "Location: admin.php?action=viewEvents&status=changesSaved" );
          
            } elseif ( isset( $_POST['cancel'] ) ) {
          
              // User has cancelled their edits: return to the event list
              header( "Location: admin.php?action=viewEvents" );
            } else {
          
              // User has not posted the event edit form yet: display the form
              $results['event'] = Event::getById( (int)$_GET['event_id'] );
             
              require( TEMPLATE_PATH . "/adminEvent.php" );
            }
        }

    

function addEvent(){
    $results = array();
    $results['pageTitle'] = "New Event";
    $results['formAction'] = 'addEvent';

    if ( isset( $_POST['saveChanges'] ) ) {
        echo json_encode($_POST);
        // User has posted the add event form: save the new event
        $event = new Event;
        
        $event->storeFormValues( $_POST );
        $event->insert();
        header( "Location: admin.php?action=viewEvents&status=changesSaved" );
    
      } elseif ( isset( $_POST['cancel'] ) ) {
    
        // User has cancelled their edits: return to the event list
        header( "Location: admin.php?action=viewEvents" );
      } else {
    
        // User has not posted the event edit form yet: display the form
        $results['event'] = new Event;
        require( TEMPLATE_PATH . "/adminEvent.php" );
      }
    }

function deleteEvent() {

    if ( !$event = Event::getById( (int)$_GET['event_id'] ) ) {
        header( "Location: admin.php?action=viewEvents&error=eventNotFound" );
        return;
    }  
    $event->delete();
    header( "Location: admin.php?action=viewEvents&status=eventDeleted" );
    }




function listEvents() {
    $results = array();
    $data = new Event;
    $data = $data->getList();
    $results['events'] = $data;
    $results['pageTitle'] = "All Events";
    
    if ( isset( $_GET['error'] ) ) {
        if ( $_GET['error'] == "eventNotFound" ) $results['errorMessage'] = "Error: Event not found.";
    }
    
    if ( isset( $_GET['status'] ) ) {
        if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Your changes have been saved.";
        if ( $_GET['status'] == "eventDeleted" ) $results['statusMessage'] = "Event deleted.";
    }
    
    require( TEMPLATE_PATH . "/listEvents.php" );
}

//Code for dealing with discount codes

function editCode(){
  $results = array();
  $results['pageTitle'] = "Edit Code";
  $results['formAction'] = 'editCode';

  if ( isset( $_POST['saveChanges'] ) ) {

      // User has posted the event edit form: save the edited event
      if ( !$discount = Discount::getById( (int)$_POST['code_id'] ) ) {
          header( "Location: admin.php?action=viewCodes&error=codeNotFound" );
          return;
        }
    
        $discount->storeFormValues( $_POST );
        $discount->update();
        header( "Location: admin.php?action=viewCodes&status=changesSaved" );
    
      } elseif ( isset( $_POST['cancel'] ) ) {
    
        // User has cancelled their edits: return to the event list
        header( "Location: admin.php?action=viewCodes" );
      } else {
    
        // User has not posted the event edit form yet: display the form
        $results['discount'] = Discount::getById( (int)$_GET['code_id'] );
       
        require( TEMPLATE_PATH . "/adminDiscount.php" );
      }
  }



function addCode(){
$results = array();
$results['pageTitle'] = "New Code";
$results['formAction'] = 'addCode';

if ( isset( $_POST['saveChanges'] ) ) {
  echo json_encode($_POST);
  // User has posted the add code form: save the new code
  $discount = new Discount;
  
  $discount->storeFormValues( $_POST );
  $discount->insert();
  header( "Location: admin.php?status=changesSaved" );

} elseif ( isset( $_POST['cancel'] ) ) {

  // User has cancelled their edits: return to the code list
  header( "Location: admin.php" );
} else {

  // User has not posted the code edit form yet: display the form
  $results['discount'] = new Discount;
  require( TEMPLATE_PATH . "/adminDiscount.php" );
}
}

function deleteCode() {

if ( !$discount = Discount::getById( (int)$_GET['code_id'] ) ) {
  header( "Location: admin.php?action=viewCodes&error=codeNotFound" );
  return;
}  
$discount->delete();
header( "Location: admin.php?action=viewCodes&status=codeDeleted" );
}




function listCodes() {
  $results = array();
  $discount = new Discount;
  $discount = $discount->getList();
  $results['discount'] = $discount;
  $results['pageTitle'] = "All Codes";

  if ( isset( $_GET['error'] ) ) {
    if ( $_GET['error'] == "codeNotFound" ) $results['errorMessage'] = "Error: Code not found.";
  }

  if ( isset( $_GET['status'] ) ) {
    if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Your changes have been saved.";
    if ( $_GET['status'] == "codeDeleted" ) $results['statusMessage'] = "Code deleted.";
  }

  require( TEMPLATE_PATH . "/listDiscounts.php" );
}

function adminHome() {
  if ( isset( $_POST['eventButton'] ) ) {
    header( "Location: admin.php?action=viewEvents" );
  }
  if ( isset( $_POST['codeButton'] ) ) {
      header( "Location: admin.php?action=viewCodes" );
    }

  require( TEMPLATE_PATH . "/adminHome.php");
}      

echo bodyEnd();
    


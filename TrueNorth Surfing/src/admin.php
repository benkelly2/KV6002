<?php

require('config.php');
session_start();
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";

include("scripts/functions.php");
echo headSetup("TNSC - Home", "../css/style.css");
echo headerSetup();
echo genNav(array("index.php" => "Home", "gallery.php" => "Gallery", "contact.php" => "Contact Us", "signup.php" => "Sign Up", "members.php" => "For Members", "shop.php" => "Shop", "admin.php" => "Admin"));
echo headerClose();
echo bodyStart("True North Surf Club");


if ( $action != "login" && $action != "logout" && !$username ) {
    login();
    exit;
  }

switch ( $action ) {
    case 'login':
        login();
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
  default:
    listEvents();
}

function login() {
    $results = array();
    $results['pageTitle'] = "Admin Login";
    if( isset( $_POST['login'])){

    if ( $_POST['username'] == ADMIN_USERNAME && $_POST['password'] == ADMIN_PASSWORD ) {

        // Login successful: Create a session and redirect to the admin homepage
        $_SESSION['username'] = ADMIN_USERNAME;
        header( "Location: admin.php" );
  
      } else {
  
        // Login failed: display an error message to the user
        $results['errorMessage'] = "Incorrect username or password. Please try again.";
        require( TEMPLATE_PATH . "/loginForm.php" );
        
    } }else {
        //Login form not posted
        require(TEMPLATE_PATH . "/loginForm.php");
}}
//Logout Function
function logout() {
    unset( $_SESSION['username'] );
    header( "Location: admin.php" );
  }
    
    

function editEvent(){
        $results = array();
        $results['pageTitle'] = "Edit Event";
        $results['formAction'] = 'editEvent';
    
        if ( isset( $_POST['saveChanges'] ) ) {
    
            // User has posted the event edit form: save the edited event
            if ( !$event = Event::getById( (int)$_POST['event_id'] ) ) {
                header( "Location: admin.php?error=eventNotFound" );
                return;
              }
          
              $event->storeFormValues( $_POST );
              $event->update();
              header( "Location: admin.php?status=changesSaved" );
          
            } elseif ( isset( $_POST['cancel'] ) ) {
          
              // User has cancelled their edits: return to the event list
              header( "Location: admin.php" );
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
        header( "Location: admin.php?status=changesSaved" );
    
      } elseif ( isset( $_POST['cancel'] ) ) {
    
        // User has cancelled their edits: return to the event list
        header( "Location: admin.php" );
      } else {
    
        // User has not posted the event edit form yet: display the form
        $results['event'] = new Event;
        require( TEMPLATE_PATH . "/adminEvent.php" );
      }
    }

function deleteEvent() {

    if ( !$event = Event::getById( (int)$_GET['event_id'] ) ) {
        header( "Location: admin.php?error=eventNotFound" );
        return;
    }  
    $event->delete();
    header( "Location: admin.php?status=eventDeleted" );
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
      
echo bodyEnd();
    


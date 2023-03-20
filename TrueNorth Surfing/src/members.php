<?php
    //ini_set("session.save_path", "WHEREVER THE SESSION DATA FILE WILL BE");
    session_start();
    include ("config.php");
    include("scripts/functions.php");
    echo headSetup("TNSC - Members", "../css/members.css");
    echo headerSetup();
    echo genNav(array("index.php" => "Home", "gallery.php" => "Gallery", "contact.php" => "Contact Us", "signup.php" => "Sign Up", "members.php" => "For Members", "shop.php" => "Shop", "admin.php" => "Admin"));
    echo headerClose();
    echo bodyStart("Members' Page");

    $action = isset( $_GET['action'] ) ? $_GET['action'] : "";


    switch ( $action ) {
      case 'archive':
        archive();
        break;
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
       archive();
    }
    
    function viewEvent(){
        $event = new Event();
        $event = $event->getById(2);
        require( TEMPLATE_PATH . "/viewEvent.php");
    
    }
    
    function archive(){
    
        $events = new Event();
        $events = $events->getList(10);
        
        // Loop through the events and echo out the information
        foreach ($events as $event) {
            if ($event->post_display == 1){
            require( TEMPLATE_PATH . "/viewEvent.php");
            }
        }
        
    }
 
    echo bodyEnd();
    ?>
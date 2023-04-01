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
    case 'editUser':
      editUser();
      break;
    case 'addUser':
        addUser();
        break;
    case 'deleteUser':
        deleteUser();
        break;
    case 'editProduct':
      editProduct();
      break;
    case 'addProduct':
        addProduct();
        break;
    case 'deleteProduct':
        deleteProduct();
        break;

    case 'viewProducts':
      listProducts();
      break;
    case 'viewEvents':
      listEvents();
      break;
    case 'viewCodes':
        listCodes();
        break;
    case 'viewUsers':
      listUsers();
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
  if ( isset( $_POST['usersButton'] ) ) {
    header( "Location: admin.php?action=viewUsers" );
  }
  if ( isset( $_POST['productsButton'] ) ) {
    header( "Location: admin.php?action=viewProducts" );
  }
  require( TEMPLATE_PATH . "/adminHome.php");
}      

//Dealing with users 


function editUser(){
  $results = array();
  $results['pageTitle'] = "Edit user";
  $results['formAction'] = 'editUser';

  if ( isset( $_POST['saveChanges'] ) ) {

      // User has posted the event edit form: save the edited event
      if ( !$user = user::getById( (int)$_POST['user_id'] ) ) {
          header( "Location: admin.php?action=viewUsers&error=userNotFound" );
          return;
        }
    
        $user->storeFormValues( $_POST );
        $user->update();
        header( "Location: admin.php?action=viewUsers&status=changesSaved" );
    
      } elseif ( isset( $_POST['cancel'] ) ) {
    
        // User has cancelled their edits: return to the event list
        header( "Location: admin.php?action=viewUsers" );
      } else {
    
        // User has not posted the event edit form yet: display the form
        $results['user'] = user::getById( (int)$_GET['user_id'] );
       
        require( TEMPLATE_PATH . "/adminUsers.php" );
      }
  }
  function deleteUser() {

    if ( !$user = user::getById( (int)$_GET['user_id'] ) ) {
      header( "Location: admin.php?action=viewUsers&error=userNotFound" );
      return;
    }  
    $user->delete();
    header( "Location: admin.php?action=viewUsers&status=userDeleted" );
    }

    function listUsers() {
      $results = array();
      $user = new user;
      $user = $user->getList();
      $results['user'] = $user;
      $results['pageTitle'] = "All Users";
    
      if ( isset( $_GET['error'] ) ) {
        if ( $_GET['error'] == "userNotFound" ) $results['errorMessage'] = "Error: User not found.";
      }
    
      if ( isset( $_GET['status'] ) ) {
        if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Your changes have been saved.";
        if ( $_GET['status'] == "userDeleted" ) $results['statusMessage'] = "User deleted.";
      }
    
      require( TEMPLATE_PATH . "/listUsers.php" );
    }

  //Product for dealing with  Products

function editProduct(){
  $results = array();
  $results['pageTitle'] = "Edit Product";
  $results['formAction'] = 'editProduct';

  if ( isset( $_POST['saveChanges'] ) ) {

      // User has posted the event edit form: save the edited event
      if ( !$product = Product::getById( (int)$_POST['product_id'] ) ) {
          header( "Location: admin.php?action=viewProducts&error=productNotFound" );
          return;
        }
    
        $product->storeFormValues( $_POST );
        $product->update();
        header( "Location: admin.php?action=viewProducts&status=changesSaved" );
    
      } elseif ( isset( $_POST['cancel'] ) ) {
    
        // User has cancelled their edits: return to the event list
        header( "Location: admin.php?action=viewProducts" );
      } else {
    
        // User has not posted the event edit form yet: display the form
        $results['product'] = Product::getById( (int)$_GET['product_id'] );
       
        require( TEMPLATE_PATH . "/adminProduct.php" );
      }
  }



function addProduct(){
$results = array();
$results['pageTitle'] = "New Product";
$results['formAction'] = 'addProduct';

if ( isset( $_POST['saveChanges'] ) ) {
  echo json_encode($_POST);
  // User has posted the add Product form: save the new Product
  $product = new Product;
  
  $product->storeFormValues( $_POST );
  $product->insert();
  header( "Location: admin.php?action=viewProducts&status=changesSaved" );

} elseif ( isset( $_POST['cancel'] ) ) {

  // User has cancelled their edits: return to the Product list
  header( "Location: admin.php" );
} else {

  // User has not posted the Product edit form yet: display the form
  $results['product'] = new Product;
  require( TEMPLATE_PATH . "/adminProduct.php" );
}
}

function deleteProduct() {

if ( !$product = Product::getById( (int)$_GET['product_id'] ) ) {
  header( "Location: admin.php?action=viewProducts&error=productNotFound" );
  return;
}  
$product->delete();
header( "Location: admin.php?action=viewProducts&status=productDeleted" );
}




function listProducts() {
  $results = array();
  $product = new Product;
  $product = $product->getList();
  $results['product'] = $product;
  $results['pageTitle'] = "All Products";

  if ( isset( $_GET['error'] ) ) {
    if ( $_GET['error'] == "productNotFound" ) $results['errorMessage'] = "Error: Product not found.";
  }

  if ( isset( $_GET['status'] ) ) {
    if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Your changes have been saved.";
    if ( $_GET['status'] == "productDeleted" ) $results['statusMessage'] = "Product deleted.";
  }

  require( TEMPLATE_PATH . "/listShop.php" );
}
    


echo genFooter(array("cookies.php" => "Cookies Policy", "privacy.php" => "Privacy Policy"));
echo bodyEnd();
    


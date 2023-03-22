<?php
class user 
{

//Initialising event Parameters
public $user_id = null;
public $username = null;
public $admin_permission = null;
public $membership_permission = null;
public $email = null;

//adding each parameter to an array containing the data 
public function __construct( $data=array() ){
    if ( isset( $data['user_id'] ) ) $this->user_id = (int) $data['user_id'];
    if ( isset( $data['username'] ) ) $this->username = preg_replace ( "/[^\.\,\-\_\'\"\@\?\!\:\$ a-zA-Z0-9()]/", "", $data['username'] );
    if ( isset( $data['email'] ) ) $this->email =  $data['email'] ;
    if ( isset( $data['admin'] ) ) $this->admin_permission =  (int) $data['admin'];
    if ( isset( $data['membership'] ) ) $this->membership_permission =  (int) $data['membership'];
}
//Storing Form data in an object 
public function storeFormValues ( $params ) {
    // Store all the parameters
    $this->__construct( $params );
  }

//Returns an user Object matching a given user ID
public static function getById( $id ) {
    $db_path = '../db/eventsDB.db';
    $conn = new PDO( 'sqlite:'.$db_path );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM user WHERE user_id = :id";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch(PDO::FETCH_ASSOC);
    $conn = null;
    if ( $row ) return new User( $row );
}
//Returns Multiple user Objects Ordered by date added 
public static function getList($numRows=10000) {
    $db_path = '../db/eventsDB.db';
    $conn = new PDO( 'sqlite:'.$db_path );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM user
            ORDER BY user_id DESC LIMIT :numRows";

    $st = $conn->prepare( $sql );
    $st->bindValue( ":numRows", $numRows, PDO::PARAM_INT );
    $st->execute();
    $list = array();

    while ( $row = $st->fetch(PDO::FETCH_ASSOC) ) {
      $user = new User( $row );
      $list[] = $user;
    }

    // Now get the total number of users that matched the criteria
    return (  $list );

  }
  public function update() {
    
    // Does the Code object have an ID?
    if ( is_null( $this->user_id ) ) trigger_error ( "Event::update(): Attempt to update an user object that does not have its ID property set.", E_USER_ERROR );
       
    // Update the User
        $db_path = '../db/eventsDB.db';
        $conn = new PDO( 'sqlite:'.$db_path );
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE user SET membership=:membership_permission, admin=:admin_permission WHERE user_id=:id";
        $st = $conn->prepare ( $sql );
        $st->bindValue( ":membership_permission", $this->membership_permission, PDO::PARAM_STR );
        $st->bindValue( ":admin_permission", $this->admin_permission, PDO::PARAM_STR );
        $st->bindValue( ":id", $this->user_id, PDO::PARAM_INT );
        $st->execute();
        $this->user_id = $conn->lastInsertId();
        $conn = null;
      }
    
    //Delete Event 
    public function delete() {
        // Does the Dicount object have an ID?
        if ( is_null( $this->user_id ) ) trigger_error ( "Event::delete(): Attempt to delete an user object that does not have its ID property set.", E_USER_ERROR );
        //Deletes Dicount from database
        $db_path = '../db/eventsDB.db';
        $conn = new PDO( 'sqlite:'.$db_path );
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM user WHERE user_id = :id ";
        $st = $conn->prepare ( $sql );
        $st->bindValue( ":id", $this->user_id, PDO::PARAM_INT );
        $st->execute();
        $conn = null;
    }}
<?php
ini_set( "display_errors", true);
date_default_timezone_set( "GMT+0" );
define( "ADMIN_USERNAME", "admin" );
define( "ADMIN_PASSWORD", "admin" );
define( "TEMPLATE_PATH", "templates");
define( "EVENT_IMAGE_PATH", "images/articles");
define( "IMG_TYPE_FULLSIZE", "fullsize" );
define( "IMG_TYPE_THUMB", "thumb" );
define( "EVENT_THUMB_WIDTH", 120 );
define( "JPEG_QUALITY", 85 );
require( "../cms/event.php");
require( "../cms/discount.php");


function handleException( $exception ) {
    echo "Sorry, a problem occurred. Please try later.";
    echo ( $exception->getMessage() );
    error_log( $exception->getMessage() );
  }
  
  set_exception_handler( 'handleException' );
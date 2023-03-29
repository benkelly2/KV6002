<?php
require('config.php');
session_start();
$action = isset($_GET['action']) ? $_GET['action'] : "";
$username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
$admin_permision = isset($_SESSION['admin_permision']) ? $_SESSION['admin_permision'] : "";

// Get the array from the HTML page using $_GET
$images = isset($_GET['images']) ? json_decode($_GET['images']) : [];

$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Append the uploaded image to the array
if ($uploadOk && isset($_FILES["fileToUpload"]["tmp_name"])) {
  $filename = basename($_FILES["fileToUpload"]["name"]);
  array_push($images, $filename);
  echo "The file ". htmlspecialchars( $filename ) . " has been uploaded.";
}

// Pass the updated array back to the HTML page using a redirect
$images_query = http_build_query(array('images' => json_encode($images)));
header('Location: gallery.php?' . $images_query);
exit;
?>

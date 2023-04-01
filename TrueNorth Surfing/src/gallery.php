<?php
    require('config.php');
    session_start();
    $action = isset( $_GET['action'] ) ? $_GET['action'] : "";
    $username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";
    $admin_permision = isset( $_SESSION['admin_permision'] ) ? $_SESSION['admin_permision'] : "";
    #$member_permision = isset( $_SESSION['member_permision'] ) ? $_SESSION['member_permision'] : "";

    //ini_set("session.save_path", "WHEREVER THE SESSION DATA FILE WILL BE");
    include("scripts/functions.php");
    echo headSetup("TNSC - Gallery", "../css/gallery.css");
    echo headerSetup();
    echo genNav(array("index.php" => "Home", "gallery.php" => "Gallery", "contact.php" => "Contact Us", "signup.php" => "Sign Up", "members.php" => "For Members", "shop.php" => "Shop", "admin.php" => "Admin"));
    echo headerClose();
    echo bodyStart("Gallery");
?>

<div id='gallery'>
    
</div>

<?php
$target_dir = "../img/";

// Initialize an empty array to store the image filenames
$images = array();

// Open the target directory, and read its contents
if (is_dir($target_dir)){
  if ($dh = opendir($target_dir)){
    while (($file = readdir($dh)) !== false){
      if ($file != "." && $file != "..") {
        array_push($images, $file);
      }
    }
    closedir($dh);
  }
}
?>

<script type="text/javascript">
// Reference to gallery div
document.addEventListener("DOMContentLoaded", function() {
  
  const gallery = document.getElementById("gallery");

  // Fetch image filenames from directory using PHP
  <?php
      $dir = "../TNSC_Pictures/";
      $images = array_diff(scandir($dir), array('..', '.'));
  ?>

  // Loop through image filenames array and create img elements for each image
    <?php $i = 1; ?>
    <?php foreach ($images as $image): ?>
    let link<?php echo $i; ?> = document.createElement("a");
    let img<?php echo $i; ?> = document.createElement("img");
    const imageLink<?php echo $i; ?> = "../TNSC_Pictures/<?php echo $image; ?>";
    img<?php echo $i; ?>.src = imageLink<?php echo $i; ?>;
    link<?php echo $i; ?>.href = imageLink<?php echo $i; ?>;
    link<?php echo $i; ?>.dataset.lightbox = "mygallery";
    img<?php echo $i; ?>.style.zIndex = 0;
    link<?php echo $i; ?>.appendChild(img<?php echo $i; ?>);
    gallery.appendChild(link<?php echo $i; ?>);
    <?php $i++; ?>
    <?php endforeach; ?>



  function resetImg(img) {
      img.style.transform = "scale(1)";
      img.style.transition = "transform 0.5s ease";
      img.all = "initial";
      img.style.zIndex = 0;
      img.style.display = "inline";
      img.style.margin = ".5em";
  }
  function enlargeImg(img) {
      img.style.transform = "scale(5)";
      img.style.transition = "transform 0.5s ease";
      img.style.zIndex = 1000;
      img.style.display = "block";
      img.style.margin = "auto";

      document.addEventListener("click", function resetOnClick(e) {
          if(!img.contains(e.target)) {
              resetImg(img);
              document.removeEventListener("click", resetOnClick);
          }
      });
  }

});

</script>

<?php

if (isset($_SESSION['admin_permision'])) {
    ?>
<form action="upload.php" method="post" enctype="multipart/form-data">
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>



<?php
}

echo bodyEnd();
?>
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

<script type="text/javascript">
// Reference to gallery div
document.addEventListener("DOMContentLoaded", function() {
  
  const gallery = document.getElementById("gallery");

  // Fetch image filenames from directory
  <?php
    $dir = "../TNSC_Pictures/TNSC_Gallery/";
    $images = array_diff(scandir($dir), array('..', '.'));

  ?>

  // Loop through image filenames array and create img elements for each image
    <?php $i = 1; ?>
    <?php foreach ($images as $image): ?>
    let link<?php echo $i; ?> = document.createElement("a");
    let img<?php echo $i; ?> = document.createElement("img");
    const imageLink<?php echo $i; ?> = "../TNSC_Pictures/TNSC_Gallery/<?php echo $image; ?>";
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
echo genFooter(array("cookies.php" => "Cookies Policy", "privacy.php" => "Privacy Policy"));
echo bodyEnd();
?>

<?php include 'chatbot/chatbot.html'; ?>

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
    const gallery = document.getElementById("gallery");

    // Define an array of image filenames
    // ------------------------------------------- QUESTION FOR GROUP: IS THERE A WAY TO LET ADMIN ADD FILE PATH TO IMAGES ARRAY?
    let images = [
        "0e10d4a2-3c06-4e3f-baf6-381cbf4d3026.jpg",
        "2c748857-1083-42a7-9779-e1a80d3f10fd.jpg",
        "4c0a6637-18e5-402c-8d3d-e8704bbef853.jpg",
        "6ba12358-74ba-4a3f-ac09-2b8692b790a4.jpg",
        "158f794c-eeb5-4885-8661-d5e7eff88e6b.jpg",
        "213ea6c0-64e3-4da1-a235-89967ba53c1a.jpg",
        "327daef3-258f-4c5e-8096-2947e60abed2.jpg",
        "9364525a-0ca0-45ad-b4cc-be1b19f9e886.jpg",
        "f64ad65e-b9dd-4cbd-b77d-74bdbc7e3b16 (1).jpg",
        "IMG_2608.JPG",
        "IMG_2610.JPG",
        "IMG_2615.JPG",
        "IMG_2616.JPG",
        "IMG_2699.JPG",
        "IMG_2909.JPG",
        "IMG_3247.JPG",
        "IMG_3532.JPG",
        "IMG_3533.JPG",
        "IMG_4783.JPG",
        'IMG_4784.JPG',
        "true  north surf club (2 of 13) (1).jpg",
        "true  north surf club (4 of 13).jpg",
        "true  north surf club (5 of 13).jpg",
        'true  north surf club (6 of 13).jpg',
        'true  north surf club (7 of 13).jpg',
        'true  north surf club (8 of 13).jpg',
        'true  north surf club (9 of 13).jpg',
        'true  north surf club (10 of 13).jpg',
        'true  north surf club (11 of 13).jpg',
        'true  north surf club (12 of 13).jpg',
        'true  north surf club (13 of 13).jpg',
        'WhatsApp Image 2022-06-09 at 11.06.17 PM.jpeg',
        'WhatsApp Image 2022-06-10 at 10.22.45 AM (1).jpeg',
        'WhatsApp Image 2022-06-10 at 10.22.46 AM (1).jpeg',
        'WhatsApp Image 2022-06-10 at 10.22.47 AM (2).jpeg',
        'WhatsApp Image 2022-06-10 at 10.22.49 AM.jpeg'
    ];

    function enlargeImg(img) {
        img.style.transform = "scale(5)";
        img.style.transition = "transform 0.5s ease";
        img.style.zIndex = 5;
        img.style.display = "block";
        img.style.margin = "auto";
        console.log("Image has been enlarged!");
    }
    function resetImg(img) {
        img.style.transform = "scale(1)";
        img.style.transition = "transform 0.5s ease";
        img.style.zIndex = 0;
        img.style.display = "inline";
        img.style.margin = ".5em";
        console.log("Image has been reset!");
    }

    for (let i=0; i<images.length; i++) {
        let img = document.createElement("img");
        img.src = "../TNSC_Pictures/" + images[i];
        img.style.zIndex = 0;
        // img.onclick = function() {
        //     enlargeImg(this);
        // };
        // img.onmouseleave = function() {
        //     resetImg(this);
        // };
        gallery.appendChild(img);
    }

</script>

<?php

if (isset($_SESSION['admin_permision'])) {
    ?>
<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
<?php
}

echo bodyEnd();
?>
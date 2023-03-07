<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <title>True North Surf Club</title>
</head>

<script>
    let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
    }
    // slides[slideIndex-1].style.display = "block";
    // dots[slideIndex-1].className += " active";
}
</script>

<body>

    <div class="header">
        <a href="index.php"><img class="logo-icon" src="../img/TrueNorthSurfClubLogo.png" alt="True North Surf Club Logo"/></a>
        <div class="header-right">
            <a class="active" href="index.php">Home</a>
            <a href="gallery.php">Gallery</a>
            <a href="contact.php">Contact Us</a>
            <a href="signup.php">Sign Up</a>
            <a href="members.php">For Members</a>
            <a href="newshop.php">Shop</a>
        </div>
    </div>

    <div class="main-body">
        <h1>True North Surf Club</h1>
        <h2>The Most Northern Surfing England Surf Club</h2>

        <!-- Slideshow container -->
<div class="slideshow-container">

<!-- Full-width images with number and caption text -->
<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="../img/jumanji.png" style="width:100%">
  <div class="text">Caption Text</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="../img/blackpanther.jpg" style="width:100%">
  <div class="text">Caption Two</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="../img/gamenight.png" style="width:100%">
  <div class="text">Caption Three</div>
</div>

<!-- Next and previous buttons -->
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
<span class="dot" onclick="currentSlide(1)"></span>
<span class="dot" onclick="currentSlide(2)"></span>
<span class="dot" onclick="currentSlide(3)"></span>
</div>

        <!-- <img class="tnsc-banner" src="../img/TrueNorthSurfClubBanner.png" alt="True North Surf Club Banner"/> -->
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis posuere nisl quam, 
            vel rutrum mauris vehicula sed. Curabitur volutpat, urna malesuada euismod consequat, 
            nulla arcu rutrum nulla, vitae rutrum magna est eget arcu. Nulla nisl orci,
            eugiat a tellus a, porttitor commodo sem. Pellentesque ornare diam purus, at iaculis mauris facilisis quis. 
            Mauris hendrerit, justo eget vulputate iaculis, nibh urna ornare dui, a accumsan nunc arcu nec tellus. 
            Suspendisse vel justo a quam hendrerit rutrum dignissim quis dui. Ut pellentesque scelerisque elit aliquet suscipit. 
            Ut euismod leo at turpis auctor auctor. Phasellus sollicitudin dui ac auctor dignissim. 
            Praesent lacinia diam vitae leo egestas convallis. Ut vestibulum aliquam lorem condimentum cursus. 
            Nullam gravida efficitur erat, quis venenatis turpis consectetur ac. Curabitur ultricies diam quis blandit sollicitudin. 
            Nam finibus erat id nunc fermentum, in viverra sapien vehicula. Aenean efficitur commodo lacinia.
        </p>
    </div>

</body>
</html>
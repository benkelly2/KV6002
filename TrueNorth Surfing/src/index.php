<?php
//ini_set("session.save_path", "WHEREVER THE SESSION DATA FILE WILL BE");
session_start();
include("scripts/functions.php");
echo headSetup("TNSC - Home", "../css/style.css");
echo headerSetup();
echo genNav(array("index.php" => "Home", "gallery.php" => "Gallery", "contact.php" => "Contact Us", "signup.php" => "Sign Up", "members.php" => "For Members", "shop.php" => "Shop", "admin.php" => "Admin"));
echo headerClose();
echo bodyStart("True North Surf Club");
?>

<div class="main-body">
    <h2>The Most Northern Surfing England Surf Club</h2>

    <!-- Slideshow container -->
    <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="../img/slideshow-image1.jpg">
            <div class="text">Independent SurfingEngland Surf Club in North Tyneside Celebrating North East Surf Culture</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="../img/slideshow-image2.jpg">
            <div class="text">Whether you caught some good ones or got totally wiped out, we hope you got out this weekend!</div>
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="../img/slideshow-image3.jpg">
            <div class="text">Don't be afraid to shoot us a message if you are interested!</div>
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
        <div class="home-text-container">
            <div class="text-container-left">
                <span>We would love you to join and get involved in shaping the future of TNSC!</span>
                <br>
                <span>Join here: https://forms.gle/zYtYgDFnCmS878jEA</span>
                <br>
                <span>are run by local surfers, for local surfers. We can fundraise for and champion our local surf community!</span>
            </div>
            <div class="text-container-middle">
                <span>We’re a louder voice as a recognised group, and are independent of any one surf school - we love them all!</span>
                <br>
                <span>We are building a lovely community and it's a great way to buddy up with fellow surfers and hang out afterwards.</span>
            </div>
            <div class="text-container-right">
                <span>Together we can promote sea safety and surf etiquette, build confidence and tackle those surf quirks using photo/video analysis or pointers from other members to help with your surf progression.</span>
                <br>
                <span>Members have access to a WhatsApp Group, where event updates will be posted, where you can organise surfs and surf trips, ask questions, swap, lend or try gear.</span>
            </div>
        </div>
</div>

<script type="text/javascript">
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
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }
</script>

<?php
echo bodyEnd();
?>
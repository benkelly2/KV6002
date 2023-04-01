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
                <span>
                    TNSC is a community of local surfers who are passionate about the sport and dedicated to helping each other progress. 
                    <br><br>
                    We're run by local surfers, for local surfers, and we champion and fundraise for our local surf community.
                </span>
            </div>
            <div class="text-container-middle">
                <span>
                Our mission is to promote sea safety and surf etiquette, while providing opportunities for our members to progress and develop their skills. 
                <br><br>
                At TNSC, we believe that everyone can benefit from learning and growing together.
                </span>
            </div>
            <div class="text-container-right">
               <span>
               As a member of TNSC, you'll have access to our WhatsApp group, where you can connect with other surfers, organize surf trips, ask questions, and swap or lend gear. 
               <br><br>
               Join us today and be a part of shaping the future of TNSC!
               </span>
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
echo genFooter(array("cookies.php" => "Cookies Policy", "privacy.php" => "Privacy Policy"));
echo bodyEnd();
?>
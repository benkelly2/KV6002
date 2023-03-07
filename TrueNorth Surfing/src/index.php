<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <title>True North Surf Club</title>
</head>

<body>

    <div class="header">
        <a href="index.php"><img class="logo-icon" src="../img/TrueNorthSurfClubLogo.png" alt="True North Surf Club Logo" /></a>
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
                <img src="../img/slideshow-image1.jpg" style="width:100%; height:80vh">
                <div class="text">Caption Text</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 3</div>
                <img src="../img/slideshow-image2.jpg" style="width:100%; height:80vh">
                <div class="text">Caption Two</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">3 / 3</div>
                <img src="../img/slideshow-image3.jpg" style="width:100%; height:80vh"> 
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
        <p class="home-text-container">
            We would love you to join and get involved in shaping the future of TNSC!
            <br>
            Join here: https://forms.gle/zYtYgDFnCmS878jEA
            <br>
            We are run by local surfers, for local surfers. We can fundraise for and champion our local surf community! We’re a louder voice as a recognised group, and are independent of any one surf school - we love them all!
            <br>
            We are building a lovely community and it's a great way to buddy up with fellow surfers and hang out afterwards. Together we can promote sea safety and surf etiquette, build confidence and tackle those surf quirks using photo/video analysis or pointers from other members to help with your surf progression. 
            <br>
            Members have access to a WhatsApp Group, where event updates will be posted, where you can organise surfs and surf trips, ask questions, swap, lend or try gear.
        </p>
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

</body>

</html>
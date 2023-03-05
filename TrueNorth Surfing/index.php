<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>True North Surf Club</title>
</head>

<body>

    <div class="header">
        <a href="index.php"><img class="logo-icon" src="img/TrueNorthSurfClubLogo.png" alt="True North Surf Club Logo"/></a>
        <div class="header-right">
            <a class="active" href="index.php">Home</a>
            <a href="src/gallery.php">Gallery</a>
            <a href="src/contact.php">Contact Us</a>
            <a href="src/signup.php">Sign Up</a>
            <a href="src/members.php">For Members</a>
            <a href="src/shop.php">Shop</a>
        </div>
    </div>

    <script>
        var slideIndex = 0;
        showSlides();

        function showSlide() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i=0; i<slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1 }
            for (i=0; i<dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";
            dots[slideIndex-1].className += " active";
            setTimeout(showSlides, 4000);
        }
    </script>

    <div class="main-body">
        <h1>True North Surf Club</h1>
        <h2>The Most Northern Surfing England Surf Club</h2>

        <div class="slideshow-container">

            <div class="mySlides fade">
                <img src="image1.jpg" style="width:100%">
                <div class="text"><strong>Caption1</strong></div>
            </div>

            <div class="mySlides fade">
                <img src="image2.jpg" style="width:100%">
                <div class="text"><strong>Caption2</strong></div>
            </div>

            <div class="mySlides fade">
                <img src="image3.jpg" style="width:100%">
                <div class="text"><strong>Caption3</strong></div>
            </div>

        </div>

        <!-- <img class="tnsc-banner" src="img/TrueNorthSurfClubBanner.png" alt="True North Surf Club Banner"/> -->
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

</body>
</html>
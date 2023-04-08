<?php
//ini_set("session.save_path", "WHEREVER THE SESSION DATA FILE WILL BE");
session_start();
include("scripts/functions.php");
echo headSetup("TNSC - Cookies Policy","../css/privacy-cookies.css");
echo headerSetup();
echo genNav(array("index.php" => "Home", "gallery.php" => "Gallery", "contact.php" => "Contact Us", "signup.php" => "Sign Up", "members.php" => "For Members", "shop.php" => "Shop", "admin.php" => "Admin"));
echo headerClose();
echo bodyStart("Cookies Policy");
?>
<div id="content">
<p>When you visit or interact with our sites, we or our authorised service providers may use cookies, web beacons, and other similar technologies for storing information to help provide you with a better, faster, and safer experience and for advertising purposes.</p>
 <p>This page is designed to help you understand more about these technologies and our use of them on our sites. Below is a summary of a few key things you should know about our use of such technologies.</p>
<h2>What are cookies, web beacons, and similar technologies?</h2>
<p>Like most sites, we use technologies that are essentially small data files placed on your computer, tablet, mobile phone, or other devices (referred to collectively as a &quot;device&quot;) that allow us to record certain pieces of information whenever you visit or interact with our sites, services, applications, messaging, and tools.</p>
<p>The specific names and types of the cookies, web beacons, and other similar technologies we use may change from time to time. In order to help you better understand this Policy and our use of such technologies we have provided the following limited terminology and definitions:</p>
<p><strong>Cookies</strong><br>Small text files (typically made up of letters and numbers) placed in the memory of your browser or device when you visit a website or view a message. Cookies allow a website to recognise a particular device or browser.</p>
<p>There are several types of cookies: <br><strong>Session cookies</strong> expire at the end of your browser session and allow us to link your actions during that browser session.</p>
<p><strong>Persistent cookies</strong> are stored on your device in between browser sessions, allowing us to remember your preferences or actions across multiple sites.</p>
 <p><strong>First-party cookies</strong> are set by the site you are visiting.</p>
<p><strong>Third-party cookies</strong> are set by a third-party site separate from the site you are visiting.</p>
</div>
<?php
echo genFooter(array("cookies.php" => "Cookies Policy", "privacy.php" => "Privacy Policy"));
echo bodyEnd();
?>

<?php include 'chatbot/chatbot.html'; ?>

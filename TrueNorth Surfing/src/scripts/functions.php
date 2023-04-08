<!-- REFERENCE
    Title: Lightbox
    Author: Lokesh Dhakar
    Date Accessed: 2/04/2023
    Availability: https://lokeshdhakar.com/projects/lightbox2/#license
-->
<?php
    function headSetup($title, $cssFile){
        $headContent = <<<HEADCONTENT
        <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="$cssFile">
        <link rel="stylesheet" href="https://use.typekit.net/wvm7epc.css">
        <link rel="stylesheet" type="text/css" href="../lightbox/dist/css/lightbox.min.css">
        <script src="../lightbox/dist/js/lightbox-plus-jquery.min.js"></script>
        <title>$title</title>
    </head>
HEADCONTENT;
    $headContent .="\n";
    return $headContent;
    }

    function headerSetup(){
        $header = <<<HEADERSETUP
        <div class="header">
            <a href="./index.php"><img class="logo-icon" src="../img/TrueNorthSurfClubLogo.png" alt="True North Surf Club Logo"/></a>
            <div class="header-right">
HEADERSETUP;
        $header .="\n";
        return $header;
    }
    function genNav(array $links) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $basketCount = isset($_SESSION["basket"]) ? count($_SESSION["basket"]) : 0;
        $output = '<div class="header-nav">';
        foreach ($links as $url => $label) {
            $output .= "<a href=\"$url\">$label</a>";
        }
        $output .= "<a href=\"basket.php\"><img src=\"../TNSC_Pictures/basket/basket.png\" alt=\"Basket\" class=\"basket-image\"><span id=\"basket-count\">$basketCount</span></a>";
        $output .= '</div>';
        return $output;
    }
    
    
    function headerClose(){
        $headerClose = <<<HEADERCLOSE
        </div>
        </div>
HEADERCLOSE;
        $headerClose .="\n";
        return $headerClose;
    }
    function bodyStart($title){
        $bodyCont = <<<BODY
        <body>
            <div class="main-body">
            <h1>$title</h1>
BODY;
        $bodyCont .="\n";
        return $bodyCont;
    }
    function footerSetup(){
        $footer = <<<FOOTERSETUP
        <div class="footer">
FOOTERSETUP;
        $footer .="\n";
        return $footer;
    }

    function genFooter(array $links){
        $output = "</div>";
        $output .= "<footer>\n";
        $output .= <<<OUTPUT
        <div class="footer">
            <a href="https://www.surfingengland.org/"><img class="badge-icon" src="../img/sufingengland.png" alt="Surfing England Badge"/></a>\n
OUTPUT;
        $output .= "<ul>\n";
        foreach($links as $key=>$Value){
            $output .= "<li><a = href='$key'>$Value</a></li>\n";
        }
        $output .= "</ul>\n";
        $output .= <<<OUTPUT
        <div class="social-icon"><a href="https://www.instagram.com/truenorthsurf"><img class="social-icon" src="../img/instagram.png" alt="TNSC Instagram"/></a></div>\n
        <div class="social-icon"><a href="https://www.facebook.com/truenorthsurf"><img class="social-icon" src="../img/facebook.png" alt="TNSC Facebook"/></a></div>\n
OUTPUT;
        $output .= "</footer>\n";
        $output .= "</div>\n";
        return $output;
    }
    function footerClose(){
        $footerClose = <<<FOOTERCLOSE
        </div>
FOOTERCLOSE;
        $footerClose .="\n";
        return $footerClose;
    }

    function bodyEnd(){
        $endBody = <<<BODYEND
        </body>
    </html>
BODYEND;
        $endBody .="\n";
        return $endBody;

    }
    // Add this code to your functions.php file

    


?>
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
        $output .= "<a href=\"basket.php\"><i class=\"fas fa-shopping-basket\"></i><span id=\"basket-count\">$basketCount</span></a>";
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
            <div id="main-body">
            <h1>$title</h1>
BODY;
        $bodyCont .="\n";
        return $bodyCont;
    }
    function footerSetup(){
        $footer = <<<FOOTERSETUP
        <div class="footer">
            <img class="badge-icon" src="../img/sufingengland.png" alt="Surfing England Badge"/>
FOOTERSETUP;
        $footer .="\n";
        return $footer;
    }

    function genFooter(array $links){
        $output = "<footer>\n";
        $output .= <<<OUTPUT
        <div class="footer">
            <a href="https://www.surfingengland.org/"><img class="badge-icon" src="../img/sufingengland.png" alt="Surfing England Badge"/></a>\n
OUTPUT;
        $output .= "<ul>\n";
        foreach($links as $key=>$Value){
            $output .= "<li><a = href='$key'>$Value</a></li>\n";
        }
        $output .= "\n";
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
        </div>
        </body>
    </html>
BODYEND;
        $endBody .="\n";
        return $endBody;

    }
    // Add this code to your functions.php file

    


?>
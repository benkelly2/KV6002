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
            <a href="../index.php"><img class="logo-icon" src="../img/TrueNorthSurfClubLogo.png" alt="True North Surf Club Logo"/></a>
            <div class="header-right">
HEADERSETUP;
        $header .="\n";
        return $header;
    }
    function genNav(array $links){

        $output = "<ul>\n";
        foreach($links as $key=>$Value){
            $output .= "<a = href='$key'>$Value</a>\n";
        }
        $output .= "\n";
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
FOOTERSETUP;
        $footer .="\n";
        return $footer;
    }

    function genFooter(array $links){
        $output = "<footer>\n";
        $output .= "<ul>\n";
        foreach($links as $key=>$Value){
            $output .= "<a = href='$key'>$Value</a>\n";
        }
        $output .= "\n";
        $output .= "</footer>\n";
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


?>
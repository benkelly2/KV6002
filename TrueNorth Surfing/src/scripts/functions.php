<?php
    function headSetup($cssFile){
        $headContent = <<<HEADCONTENT
        <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="$cssFile">
        <title>Contact</title>
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
    function bodyStart($Titles){
        $bodyCont = <<<BODY
        <body>
            <div id="main-body">
            <h1>$title</h1>
BODY;
        $bodyCont .="\n";
        return $bodyCont;
    }
    function bodyEnd(){
        $endBody = <<<BODYEND
        </div>
        </body>
BODYEND;
        $endBody .="\n";
        return $endBody;

    }


    ?>
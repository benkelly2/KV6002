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

    function bodyStartSetup(){
        $bodyContent = <<<BODYCONTENT
    <body>

        <div class="header">
            <a href="../index.php"><img class="logo-icon" src="../img/TrueNorthSurfClubLogo.png" alt="True North Surf Club Logo"/></a>
            <div class="header-right">
BODYCONTENT;
        $bodyContent .="\n";
        return $bodyContent;
    }

    function genNav(array $links){

        $output = "<ul>\n";
        foreach($links as $key=>$Value){
            $output .= "<a = href='$key'>$Value</a>\n";
        }
        $output .= "\n";
        return $output;
        
    }
    function bodyClose($heading){
        $bodyEnd = <<<BODYEND
        </div>
        </div>
    <h1>$heading</h1>

    </body>
BODYEND;
        $bodyEnd .="\n";
        return $bodyEnd;
    }
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
    // Add this code to your functions.php file

    function getProductById($id) {
        // Example product data
        $products = [
            [
                'id' => 1,
                'title' => 'TNSC T-Shirt',
                'price' => 19.99,
                'img' => '../TNSC_Pictures/TNSC_tshirt/11fdc54b-48c6-42f6-ac37-9dc6fe538ef6.jpeg',
                'description' => 'A comfortable TNSC T-Shirt'
            ],
            [
                'id' => 2,
                'title' => 'TNSC Hoodie',
                'price' => 39.99,
                'img' => '../TNSC_Pictures/TNSC_tshirt/11fdc54b-48c6-42f6-ac37-9dc6fe538ef6.jpeg',
                'description' => 'A comfortable TNSC T-Shirt'
            ],
            [
                'id' => 3,
                'title' => 'TNSC Cap',
                'price' => 14.99,
                'img' => '../TNSC_Pictures/TNSC_tshirt/11fdc54b-48c6-42f6-ac37-9dc6fe538ef6.jpeg',
                'description' => 'A comfortable and stylish TNSC T-Shirt.'
            ],
            [
                'id' => 4,
                'title' => 'TNSC Wax',
                'price' => '3.29',
                'img' => '../TNSC_Pictures/TNSC_tshirt/11fdc54b-48c6-42f6-ac37-9dc6fe538ef6.jpeg',
                'description' => 'A comfortable and stylish TNSC T-Shirt.'
            ],
            [
                'id' => 5,
                'title' => 'TNSC Membership',
                'price' => '14.99',
                'img' => '../TNSC_Pictures/TNSC_tshirt/11fdc54b-48c6-42f6-ac37-9dc6fe538ef6.jpeg',
                'description' => 'A comfortable and stylish TNSC T-Shirt.'
            ],
            [
                'id' => 6,
                'title' => 'TNSC Membership',
                'price' => '14.99',
                'img' => '../TNSC_Pictures/TNSC_tshirt/11fdc54b-48c6-42f6-ac37-9dc6fe538ef6.jpeg',
                'description' => 'A comfortable and stylish TNSC T-Shirt.'
            ],
            [
                'id' => 7,
                'title' => 'TNSC Membership',
                'price' => '14.99',
                'img' => '../TNSC_Pictures/TNSC_tshirt/11fdc54b-48c6-42f6-ac37-9dc6fe538ef6.jpeg',
                'description' => 'A comfortable and stylish TNSC T-Shirt.'
            ],
            [
                'id' => 8,
                'title' => 'TNSC Membership',
                'price' => '14.99',
                'img' => '../TNSC_Pictures/TNSC_tshirt/11fdc54b-48c6-42f6-ac37-9dc6fe538ef6.jpeg',
                'description' => 'A comfortable and stylish TNSC T-Shirt.'
            ],
            [
                'id' => 9,
                'title' => 'TNSC Membership',
                'price' => '14.99',
                'img' => '../TNSC_Pictures/TNSC_tshirt/11fdc54b-48c6-42f6-ac37-9dc6fe538ef6.jpeg',
                'description' => 'A comfortable and stylish TNSC T-Shirt.'
            ],
            [
                'id' => 10,
                'title' => 'TNSC Membership',
                'price' => '14.99',
                'img' => '../TNSC_Pictures/TNSC_tshirt/11fdc54b-48c6-42f6-ac37-9dc6fe538ef6.jpeg',
                'description' => 'A comfortable and stylish TNSC T-Shirt.'
            ]
        ];

        // Search for the product with the given ID
        foreach ($products as $product) {
            if ($product['id'] == $id) {
                return $product;
            }
        }

        // If no matching product is found, return null
        return null;
}


?>
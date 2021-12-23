<?php
require 'vendor/autoload.php';
// use ParsedownExtra;
error_log("reading file " . $_REQUEST['p']);

function readMD($file) {
    //reads only Markdown files
    if (substr($file, -3) != '.md') {
        //no md file 
        //check if last character is a /
        if (substr($file, -1) == '/') {
            $file .= 'index.md';
        }else{
            $file .= '/index.md';
        }
    }
    error_log($file);
    //get text from file
    $text = file_get_contents("/www/virtualhosts/ilt.kuleuven.be/html/php72/docs/".$file);
    //if not found return 404
    if ($text == false) {
        $text = file_get_contents('404.md');
    }


    //parse text
    $Extra = new ParsedownExtra();
    $html = $Extra->text($text);
    //get title
    $title = $Extra->line(substr($text, 0, strpos($text, "\n")));
    // remove any number of # from title
    $title = preg_replace('/^#+/', '', $title);
    //return title and html
    return array($title, $html);
}


list($title,$body) = readMD($_REQUEST['p']??"index.md");
echo HTML(
    HEAD($title).
    BODY(
        $body
    )
);

function BODY($children){
    return '<body>
    '.$children.'
    </body>';
}

function HTML($children){
    return  '
    <html lang="en">
    '.$children.'
    </html>';
    
}
function HEAD($title){
    return '
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>'.$title.'</title>
    <link rel="stylesheet" href="https://ilt.kuleuven.be/php72/ici/docs/stylesheet.css">
</head>';
}
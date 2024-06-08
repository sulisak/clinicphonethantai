<?php    
   header('Content-type: image/png');
    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';

    include "qrlib.php";    
    

$files = glob($PNG_WEB_DIR.'/*');  
   
// Deleting all the files in the list 
 
//////////////////////////

	
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    $filename = $PNG_TEMP_DIR.'test.png';
    
    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'H';
    $matrixPointSize = 10;
 
    
        // user data
        $filename = $PNG_TEMP_DIR.'test'.md5($_GET['code'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
        QRcode::png($_GET['code'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
      
        
    //display generated file
   // echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" />'; 
	
	
	
readfile($PNG_WEB_DIR.basename($filename));


    
   
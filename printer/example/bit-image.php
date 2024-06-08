


<?php

define('UPLOAD_DIR', 'pic/');
    $img = $_POST['imgBase64'];
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    $file = UPLOAD_DIR .'1.png';
    $success = file_put_contents($file, $data);
    print $success ? $file : 'Unable to save the file.';



/* Example print-outs using the older bit image print command */
require __DIR__ . '/../autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

$connector = new WindowsPrintConnector("XP-58");
$printer = new Printer($connector);

try {
    $tux = EscposImage::load("pic/1.png", false);
    $printer -> bitImage($tux);
    $printer -> feed();
    
    
} catch (Exception $e) {
    /* Images not supported on your PHP, or image file not found */
    $printer -> text($e -> getMessage() . "\n");
}

$printer -> cut();
$printer -> close();

?>


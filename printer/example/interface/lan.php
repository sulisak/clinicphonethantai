<?php
switch ($_SERVER['HTTP_ORIGIN']) {
    case 'https://c2mposonline.com': case 'https://www.c2mposonline.com':
    header('Access-Control-Allow-Origin: '.$_SERVER['HTTP_ORIGIN']);
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Max-Age: 1000');
    header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
    break;
}

$imagedata = base64_decode($_POST['imgdata']);
$filename = '1';
//path where you want to upload image
$file = 'pic/'.$filename.'.png';
$imageurl  = 'pic/'.$filename.'.png';
file_put_contents($file,$imagedata);

/* Change to the correct path if you copy this example! */
require __DIR__ . '/../../autoload.php';
use Mike42\Escpos\Printer;
//use Mike42\Escpos\GdEscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
//use Mike42\Escpos\CapabilityProfile;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;

/* Most printers are open on port 9100, so you just need to know the IP
 * address of your receipt printer, and then fsockopen() it on that port.
 */
try {

  if($_POST['printer_ul']=='1'){

    $connector = new WindowsPrintConnector('c2mpos');
    echo $_POST['printer_name'];
  }

  if($_POST['printer_ul']=='2'){

    $connector = new NetworkPrintConnector($_POST['cashier_printer_ip'], 9100);
    echo $_POST['cashier_printer_ip'];
  }

    //$profile = CapabilityProfile::load("TSP600");
$printer = new Printer($connector);

//$ticketim = imagecreatefrompng("pic/1.png");
//$ticketim = imagecreatefrompng("pic/".$filename.".png");

$tux = EscposImage::load("pic/".$filename.".png", false);

    //$printer -> graphics($tux);
     //$printer -> bitImageColumnFormat($tux);
     $printer -> pulse();
  //  $printer -> bitImage($tux);
//$printer -> feed(2);
//$printer -> cut();

// if($_POST['print_section'] =='slip' ){
//     $printer -> bitImage($tux);
// //$printer -> feed(2);
// $printer -> cut();
// }


$printer -> close();
} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}
